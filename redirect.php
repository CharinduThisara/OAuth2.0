<?php
require_once 'vendor/autoload.php'; // Load the Google API Client Library
session_start();

function generateStateParameter() {
    // Here's a hash based on the user's session ID
    return md5(session_id());
}

if (isset($_SESSION['user'])) {
    // If the 'user' key is already set in the session, redirect to the dashboard
    header('Location: dashboard.php');
    exit;
}

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
} else{ 

    if (!isset($_GET['code'])) {
        // If no authorization code is present, initiate the Google login process

        $state = generateStateParameter();
        $_SESSION['oauth2state'] = $state;

        $client->setState($state);
        $auth_url = $client->createAuthUrl();
        
        header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        exit;
    } else {
        // Exchange the authorization code for an access token
        $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();

        if (isset($_SESSION['access_token'])) {
            // If access token is available, fetch the user's information and store it in the session
            $client->setAccessToken($_SESSION['access_token']);
            $oauth2 = new Google_Service_Oauth2($client);
            $userInfo = $oauth2->userinfo->get();
            $_SESSION['user'] = $userInfo;

            // Redirect to the dashboard with the user's name
            header('Location: dashboard.php');
            exit;
        } else {
            // Handle errors or unsuccessful authentication
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/redirect.php';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }
    }
}
?>
