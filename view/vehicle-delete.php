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
    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
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
                <h1><?php if (isset($invInfo['invMake'])) {
                        echo "Delete $invInfo[invMake] $invInfo[invModel]";
                    } ?></h1>
                <p>Confirm Vehicle Deletion. The delete is permanent.</p>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="form-div">
                    <p class="add-v-note"><sup>*</sup>Note all Fields are Required</p>

                    <form class="form" action="/phpmotors/vehicles/index.php" method="post">
                        <?php
                        echo $classificationList
                        ?>
                        <label>
                            Make
                            <input class="input-registration" type="text" name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                                                            echo "value='$invMake'";
                                                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                                                            echo "value='$invInfo[invMake]'";
                                                                                                        } ?> readonly>
                        </label>
                        <label>
                            Model
                            <input class="input-registration" type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                                                            echo "value='$invModel'";
                                                                                                        } elseif (isset($invInfo['invModel'])) {
                                                                                                            echo "value='$invInfo[invModel]'";
                                                                                                        } ?> readonly>

                            <label>
                                Description
                                <textarea class="textarea-add-v" name="invDescription" readonly><?php if (isset($invDescription)) {
                                                                                                    echo $invDescription;
                                                                                                } elseif (isset($invInfo['invDescription'])) {
                                                                                                    echo $invInfo['invDescription'];
                                                                                                } ?></textarea>
                            </label>
                            <button class="add-v-button" type="submit" name="submit">Delete Vehicle</button>
                            <a id="goBack" href="/phpmotors/vehicles/index.php">Go back<i class="fa-solid fa-circle-left"></i></a>
                            <input type="hidden" name="action" value="deleteVehicle">
                            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                            echo $invInfo['invId'];
                                                                        } ?>">
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