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
            } else {
                echo '<p>User name not found.</p>';
            }
        ?>
    </div>
</body>
</html>
