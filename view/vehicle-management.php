<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newcss.css" type="text/css" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
                    // require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/nav.php"
                    echo $navList;
                    ?>
                </nav>
            </header>
            <main>
                <h1>Vehicle Management</h1>
                <div class="management-div">
                    <ul>
                        <li><a href="index.php/?action=classifcation">Add Classifcation</a></li>
                        <li><a href="index.php/?action=vehicle">Add Vehicle</a></li>
                    </ul>
                </div>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                if (isset($classificationList)) {
                    echo '<h2>Vehicles By Classification</h2>';
                    echo '<p>Choose a classification to see those vehicles</p>';
                    echo $classificationList;
                }
                ?>
                <noscript>
                    <p>
                        <strong>JavaScript Must Be Enabled to Use this Page.</strong>
                    </p>
                </noscript>
                <table id="inventoryDisplay"></table>
            </main>
            <footer>
                <?php
                require $_SERVER["DOCUMENT_ROOT"] . "/phpmotors/snippets/footer.php"
                ?>
            </footer>
        </div>
    </div>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>