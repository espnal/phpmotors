<?php
// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
// Create or access a Session
session_start();
// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the vehicle model
require_once 'model/vehicles-model.php';
// Get the account model.
require_once 'model/accounts-model.php';
// Get the functions library
require_once 'library/functions.php';
// Get the uploads images model
require_once 'model/uploads-model.php';
// Get the vehicles review
require_once 'model/reviews-model.php';
$classifications = getClassifications();
$navList = createNavList($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action' . FILTER_SANITIZE_STRING);
}
switch ($action) {
    case 'template':
        include 'view/template.php';
        break;

    default:
        include 'view/home.php';
        break;
}
