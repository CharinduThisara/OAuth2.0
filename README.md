# OAuth2.0

### OAuth Implementation for Google Sign-In

This repository contains the implementation of OAuth for Google Sign-In in PHP. Users can log in with their Google accounts and access the dashboard of Pandora Company Limited.

#### Files

1. **login.php**: This file represents the login page. It contains the HTML markup and PHP script necessary to initiate the Google Sign-In process.

2. **redirect.php**: This file is responsible for handling the OAuth flow. It initiates the Google login process, exchanges the authorization code for an access token, and retrieves the user's information.

3. **dashboard.php**: This file displays the user's dashboard after successful authentication. It shows a welcome message and allows users to log out.

#### Instructions

To set up the project, follow these steps:

1. Clone the repository.
2. Run `composer install` to install the necessary dependencies.
3. Configure the `client_secret.json` file with the appropriate credentials for your Google application.
4. Ensure that the appropriate PHP environment is set up for the project to run successfully.

#### Usage

1. Access the `login.php` page.
2. Click on the "Sign in with Google" button to initiate the authentication process.
3. Upon successful authentication, the user is redirected to the dashboard.
4. On the dashboard, the user can view a personalized welcome message.
5. Click the "Logout" button to end the session and return to the login page.

#### Note

This implementation is a basic demonstration of OAuth integration for Google Sign-In. For a production environment, it is recommended to follow best practices for security and error handling.

#### Authors

- [Charindu Thisara]

#### Acknowledgements

We would like to acknowledge the following resources that helped in the development of this project:

- [Using OAuth 2.0 to Access Google APIs.](https://developers.google.com/identity/protocols/oauth2)
- [Google-api-php-client](https://github.com/googleapis/google-api-php-client )

---
Last Updated: [21/10/2023]
