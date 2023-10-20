<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pandora Company Limited</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .container {
            margin-top: -300px;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background-color: #222;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
        }

        .logout-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            require_once 'vendor/autoload.php';

            session_start();
            if (isset($_SESSION['user'])) {
                $userInfo = $_SESSION['user'];
                $userName = $userInfo->name;
                echo '<h1>Hello, ' . $userName . '!</h1>';
                echo '<p>Welcome to Pandora Company Limited.</p>';
                echo '<form action="" method="post">';
                echo '<input type="submit" class="logout-btn" name="logout" value="Logout">';
                echo '</form>';

                // Handle logout
                if (isset($_POST['logout'])) {
                    // Unset all of the session variables
                    $_SESSION = array();
                    // Destroy the session
                    session_destroy();
                    // Redirect to the login page or any other appropriate location after logout
                    header("Location: login.php");
                    exit;
                }
            } else {
                echo '<p>User name not found.</p>';
            }
        ?>
    </div>
</body>
</html>
