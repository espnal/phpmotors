<?php
// This is the accounts controller

// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads images model
require_once '../model/uploads-model.php';
// Get the vehicles review
require_once '../model/reviews-model.php';
// Get the account model
require_once '../model/accounts-model.php';

$classifications = getClassifications();
$navList = createNavList($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
switch ($action) {
    case "register":
        //Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
        $clientLastname = filter_input(INPUT_POST, 'clientLastname');
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // check existing email
        $existingEmail = checkExistingEmail($clientEmail);

        // Deal with existing email during registration
        if ($existingEmail) {
            $message = "<p class='msg'> The email address already exists. Do you want to login instead?</p>";
            $_SESSION['message'] = $message;
            include '../view/login.php';
            exit;
        }
        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="msg">Please provide information for all empty form fields.</p>';
            $_SESSION['message'] = $message;
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // echo $regOutcome;

        // Check and report the result
        if ($regOutcome === 1) {
            // Check and report the result
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            // $message = "<p class='msg success'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
            // include '../view/login.php';
            exit;
        } else {
            $message = "<p class='msg error'>Sorry but the registration failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            include '../view/registration.php';
            exit;
        }
    case 'login-page':
        include '../view/login.php';
        break;
    case 'login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        if (empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="msg error">Please provide information for all empty form fields.</p>';
            $_SESSION['message'] = $message;
            include '../view/login.php';
            exit;
        }
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            $_SESSION['message'] = $message;
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            $_SESSION['message'] = $message;
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // $invId = $_SESSION['clientData']['clientId'];
        // $vehicle = getReviewsByClient($invId);

        $reviewList = getReviewsByClient($_SESSION['clientData']['clientId']);
        $reviewContent = '<ul>';
        foreach ($reviewList as $review) {
            $reviewContent .= buildReviewItem($review);
        }
        $reviewContent .= '</ul>';
        // Send them to the admin view
        include '../view/admin.php';
        exit;
    case 'logout':
        session_destroy();
        header('Location: /phpmotors/accounts/?action=login');
        break;
    case 'update':
        include '../view/client-update.php';
        break;
    case 'updateClient':
        // Get the data from the view.
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_SANITIZE_EMAIL);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $newEmail = checkEmail($newEmail);
        // var_dump(checkExistingEmail($newEmail));
        if (checkExistingEmail($newEmail)) {
            $message = "Email already exist, please try a different one.";
            $_SESSION['message'] = $message;
            include '../view/client-update.php';
            exit;
        }

        if (empty($firstName) || empty($lastName) || empty($newEmail) || empty($invId)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            $_SESSION['message'] = $message;
            include '../view/client-update.php';
            exit;
        }

        $resultPersonal = updateClient($firstName, $lastName, $newEmail, $invId);

        // Query the client data based on the email address
        $clientData = getClientId($invId);
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        if ($resultPersonal === 1) {
            $message = "<p>Information update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/index.php');
            exit;
        } else {
            $message = "<p>Sorry, but information update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/index.php');
            exit;
        }
        break;
    case 'updatePassword':
        $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $checkPassword = checkPassword($newPassword);

        if (empty($checkPassword)) {
            $message = '<p>Please make sure the password matches the desired pattern</p>';
            $_SESSION['message'] = $message;
            include '../view/client-update.php';
            exit;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $resultPassword = updateNewPassword($hashedPassword, $invId);

        if ($resultPassword === 1) {
            $message = "<p>Password update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/index.php');
            exit;
        } else {
            $message = "<p>Sorry, but password update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/accounts/index.php');
            exit;
        }
        break;

    default:
        if (isset($_SESSION['loggedin'])) {
            if ($_SESSION['loggedin']) {
                $reviewList = getReviewsByClient($_SESSION['clientData']['clientId']);
                $reviewContent = '<ul>';
                foreach ($reviewList as $review) {
                    $reviewContent .= buildReviewItem($review);
                }
                $reviewContent .= '</ul>';
            }
        }
        include '../view/admin.php';
        break;
}
