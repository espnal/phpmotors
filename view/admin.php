<?php
if (!$_SESSION['loggedin']) {
    header('Location: /index.php/');
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
    <title>Admin</title>
</head>

<body>
    <div class="all-content">
        <div class="square-content">
            <header>
                <?php
                require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/header_ac.php"
                ?>
            </header>
            <nav>
                <?php echo $navList; ?>
            </nav>
            <main>
                <div class="div-adm">
                    <h1>
                        <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?>
                    </h1>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    ?>
                    <div class="user-management">
                        <p id="login">You are logged in.</p>
                        <ul class="ul-adm">
                            <li>
                                <?php echo "First Name: " . $_SESSION['clientData']['clientFirstname']; ?>
                            </li>
                            <li>
                                <?php echo "Last Name: " . $_SESSION['clientData']['clientLastname'] ?>
                            </li>
                            <li>
                                <?php echo "Email: " . $_SESSION['clientData']['clientEmail']; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="manege-links">
                        <?php
                        if (intval($_SESSION['clientData']['clientLevel']) > 1) {
                            echo "<h2>Inventory Management</h2>";
                            echo "<p>Press the button to manage the vehicle inventory</p>";
                            echo "<a class='adm-btn' href = '../vehicles/index.php'>Management</a>";
                        }
                        ?>
                        <div class="update-div">
                            <h2>Update account information</h2>
                            <p>Press the button to update your account information</p>
                            <a class='adm-btn' href="/phpmotors/accounts/index.php?action=update">Update account</a>
                        </div>
                        <div class="review-list">
                            <h3>All your Reviews</h3>
                            <?php if (isset($reviewContent)) {
                                echo $reviewContent;
                            } ?>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <?php
                require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"
                ?>
            </footer>
        </div>
    </div>
</body>

</html><?php unset($_SESSION['message']); ?>