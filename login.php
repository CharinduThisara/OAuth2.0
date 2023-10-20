<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .login-container {
            text-align: center;
        }

        .login-btn {
            display: inline-block;
            background-color: #4285F4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .login-btn:hover {
            background-color: #3367D6;
        }

        .svg-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            fill: #ffffff;
            vertical-align: middle;
        }

        .button-text {
            margin-top: 2px;
            font-weight: 500;
            letter-spacing: 1px;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login with Google</h2>
        <?php
        require_once 'vendor/autoload.php';
        session_start();
        $state = bin2hex(random_bytes(16));
        $_SESSION['oauth2state'] = $state;
        ?>
        <a href="redirect.php?state=<?php echo $state; ?>" class="login-btn">
            <div class="n o ku">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" class="ah svg-icon" style="vertical-align: middle;">
                    <g fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M20.64 12.2c0-.63-.06-1.25-.16-1.84H12v3.49h4.84a4.14 4.14 0 0 1-1.8 2.71v2.26h2.92a8.78 8.78 0 0 0 2.68-6.61z" fill="#4285F4"></path>
                        <path d="M12 21a8.6 8.6 0 0 0 5.96-2.18l-2.91-2.26a5.41 5.41 0 0 1-8.09-2.85h-3v2.33A9 9 0 0 0 12 21z" fill="#34A853"></path>
                        <path d="M6.96 13.71a5.41 5.41 0 0 1 0-3.42V7.96h-3a9 9 0 0 0 0 8.08l3-2.33z" fill="#FBBC05"></path>
                        <path d="M12 6.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58A9 9 0 0 0 3.96 7.96l3 2.33A5.36 5.36 0 0 1 12 6.6z" fill="#EA4335"></path>
                    </g>
                </svg>
                <span class="button-text">Sign in with Google</span>
            </div>
        </a>
    </div>
</body>
</html>
