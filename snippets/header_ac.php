<div class="logo-div">
    <img src="/phpmotors/images/site/logo.png" alt="logo">
    <div class="my-account-section">
        <?php

        if (isset($_SESSION['loggedin'])) {
            echo "<a class='welcomeMsg' href='/phpmotors/accounts/index.php'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a>";
            echo " | ";
        } else {
        }
        ?>
        <?php
        if (isset($_SESSION['loggedin'])) {
            echo '<a class="ac-button" href="/phpmotors/accounts/index.php/?action=logout">Logout</a>';
        } else {
            echo '<a class="ac-button" href="/phpmotors/accounts/index.php/?action=login">My Account</a>';
        }
        ?>
    </div>
</div>