<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
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
    <title>Sign in PHP motors</title>
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
                    // require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/nav.php"
                    echo $navList;

                    ?>
                </nav>
            </header>
            <main>
                <h1>Add Car Classification</h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="form-div">
                    <form class="form" action="/phpmotors/vehicles/" method="post">
                        <label>Classification Name<input type="text" class="input-registration" name="newClassification" id="newClassification" maxlength="30" required></label>
                        <span>Make sure to add no more than 30 characters </span>
                        <button class="add-c-button" type="submit" name="submit">Add Classification</button>
                        <!-- <br> -->
                        <a id="goBack" href="/phpmotors/vehicles/index.php">Go back<i class="fa-solid fa-circle-left"></i></a>
                        <input type="hidden" name="action" value="addClass">
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