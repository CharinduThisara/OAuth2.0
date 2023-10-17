<?php
require_once 'vendor/autoload.php';// Load the Google API Client Library

session_start();
$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);

$auth_url = $client->createAuthUrl();
header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));

$client->fetchAccessTokenWithAuthCode($_GET['code']);
$_SESSION['access_token'] = $client->getAccessToken();

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();
    $_SESSION['user'] = $userInfo;

    // Redirect to the dashboard with the user's name
    header('Location: dashboard.php');

} else {
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/redirect.php';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
?>
