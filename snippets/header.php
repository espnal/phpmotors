    <div class="logo-div">
        <img src="images/site/logo.png" alt="">
        <div class="my-account-section">
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo "<a class='welcomeMsg' href='accounts/index.php'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a>";
                echo " | ";
            }
            ?>
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<a class="ac-button" href="accounts/index.php/?action=logout">Logout</a>';
            } else {
                echo '<a class="ac-button" href="accounts/index.php/?action=login">My Account</a>';
            }
            ?>

        </div>
    </div>