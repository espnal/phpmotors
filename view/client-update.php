<?php
if (!$_SESSION['loggedin']) {
    header('Location: /phpmotors/accounts/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/newcss.css" type="text/css" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/939c9d406a.js" crossorigin="anonymous"></script>
    <title>PHP Motors</title>
</head>

<body>
    <div class="all-content">
        <div class="square-content">
            <header>
                <?php
                require $_SERVER["DOCUMENT_ROOT"] . "/phpmotors/snippets/header_ac.php"
                ?>
                <nav>
                    <?php
                    echo $navList;
                    ?>
                </nav>
            </header>
            <main>
                <h1><?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?></h1>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <p>You are logged in.</p>
                <div class="form-div">
                    <form class="form" action="/phpmotors/accounts/index.php" method="post">
                        <h2 class="h2-update">Update Account</h2>
                        <label>First Name
                            <input class="input-registration" type="text" name="firstName" <?php if (isset($firstName)) {
                                                                                                echo "value='$firstName'";
                                                                                            } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                                echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                                                                                            } ?> required>
                        </label>
                        <label>Last Name
                            <input class="input-registration" type="text" name="lastName" <?php if (isset($lastName)) {
                                                                                                echo "value='$lastName'";
                                                                                            } elseif (isset($_SESSION['clientData']['clientLastname'])) {
                                                                                                echo "value='" . $_SESSION['clientData']['clientLastname'] . "'";
                                                                                            } ?> required>
                        </label>
                        <label>Email
                            <input class="input-registration" type="text" name="newEmail" <?php if (isset($newEmail)) {
                                                                                                echo "value='$newEmail'";
                                                                                            } elseif (isset($_SESSION['clientData']['clientEmail'])) {
                                                                                                echo "value='" . $_SESSION['clientData']['clientEmail'] . "'";
                                                                                            } ?> required>
                        </label>
                        <button class="add-v-button" type="submit">Update information</button>
                        <input type="hidden" name="action" value="updateClient">
                        <input type="hidden" name="invId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo "value='" . $_SESSION['clientData']['clientId'] . "'";
                                                            } ?>>
                    </form>
                    <form class="form" action="/phpmotors/accounts/index.php" method="post">
                        <h2 class="h2-update">Update Password</h2>
                        <label>Password
                            <input class="input-registration" type="Password" name="newPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        </label>
                        <span>At least 8 characters, at least 1 capital letter, at least 1 number and at least 1 special character.</span>
                        <button class="add-v-button" type='submit'>Update Password</button>
                        <input type="hidden" name="action" value="updatePassword">
                        <input type="hidden" name="invId" <?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo "value='" . $_SESSION['clientData']['clientId'] . "'";
                                                            } ?>>
                    </form>
                </div>
            </main>
            <footer>
                <?php
                require $_SERVER["DOCUMENT_ROOT"] . "/phpmotors/snippets/footer.php"
                ?>
            </footer>
        </div>
    </div>
</body>

</html>