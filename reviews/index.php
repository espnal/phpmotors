
<?php
// Review controler 
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
// Get the account model.
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads images model
require_once '../model/uploads-model.php';
// Get the vehicles review
require_once '../model/reviews-model.php';

$classifications = getClassifications();
$navList = createNavList($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
    case 'test':
        echo "TEST";
        break;
    case 'newReview':
        $reviewText = filter_input(INPUT_POST, 'newReview', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $vehicleId = filter_input(INPUT_POST, 'carId', FILTER_SANITIZE_NUMBER_INT);

        if (empty($reviewText) || empty($clientId) || empty($vehicleId)) {
            $_SESSION['message'] = '<p class="msg error">Please provide information for all empty form fields.</p>';
            header('Location: /phpmotors/vehicles/?action=vehicleView&Vehicle=' . $vehicleId);
            exit;
        }
        $AddReviewReport = insertReview($clientId, $reviewText, $vehicleId);

        if ($AddReviewReport === 1) {
            $_SESSION['message'] = "<p class='msg success'>Review has been added successfully.</p>";
            header('Location: /phpmotors/vehicles/?action=vehicleView&Vehicle=' . $vehicleId);
            exit;
        } else {
            $_SESSION['message'] = "<p class='msg error'>Sorry, there was an error. Please try again.</p>";
            header('Location: /phpmotors/vehicles/?action=vehicleView&Vehicle=' . $vehicleId);
            exit;
        }
        break;
    case 'editReview':

        $reviewId = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'editReviewText', FILTER_SANITIZE_STRING);

        if (empty($reviewId) || empty($reviewText)) {
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
            include '../view/update-review.php';
            exit;
        }

        $updateReport = updateReview($reviewText, $reviewId);
        if ($updateReport == 1) {
            $_SESSION['message'] = "<p class='msg success'>The post was successfully updated.</p>";
        } else {
            $_SESSION['message'] = "<p class='msg error'>Sorry, there was an error. Please try again.</p> ";
        }
        header('location: /phpmotors/accounts/index.php');
        exit;
        break;
    case 'confirmEdit':
        $reviewId = filter_input(INPUT_GET, 'review', FILTER_SANITIZE_NUMBER_INT);

        $review = getReview($reviewId);

        include '../view/update-review.php';
        break;
    case 'confirmDelete':
        $reviewId = filter_input(INPUT_GET, 'review', FILTER_SANITIZE_NUMBER_INT);

        $review = getReview($reviewId);
        include '../view/confirm-delete.php';
        break;
    case 'deleteReview':
        $reviewId = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_NUMBER_INT);

        $deleteReport = deleteReview($reviewId);
        if ($deleteReport == 1) {
            $_SESSION['message'] = "<p class='msg success'>The post was successfully delete.</p>";
        } else {
            $_SESSION['message'] = "<p class='msg error'>Sorry, there was an error. Please try again.</p> ";
        }

        header('location: /phpmotors/accounts/index.php');
        exit;
        break;
    default:
        if ($_SESSION['loggedin']) {
            $reviewList = getReviewsByClient($_SESSION['clientData']['clientId']);
            $reviewContent = '<ul class= "review-list-adm">';
            foreach ($reviewList as $review) {
                $reviewContent .= buildReviewItem($review['reviewDate'], $review['reviewId']);
            }
            $reviewContent .= '</ul>';
        }
        include '../view/admin.php';
        break;
}

?>