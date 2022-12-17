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
    <title>Login in PHP motors</title>
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
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
                <div class="form-div">
                    <form class="form" action="/phpmotors/accounts/index.php" method="POST">
                        <h1 id="title-ac">Sign in</h1>
                        <label>Enter your Email
                            <input class="input-registration" name="clientEmail" type="email" placeholder="Email" <?php if (isset($clientEmail)) {
                                                                                                                        echo "value='$clientEmail'";
                                                                                                                    }  ?> required>
                        </label>
                        <label>Password
                            <input class="input-registration" name="clientPassword" type="password" placeholder="Password" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        </label>
                        <span>At least 8 characters, at least 1 capital letter, at least 1 number and at least 1 special character.</span>
                        <button id="lgbtn" type="submit">Login</button>
                        <span>No account?
                            <a href="index.php/?action=register">Sign up here</a></span>
                        <input type="hidden" name="action" value="login">
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
<?php unset($_SESSION['message']); ?>