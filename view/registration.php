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
    <title>Registration PHP motors</title>
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
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="form-div">
                    <form class="form" action="/phpmotors/accounts/index.php" method="post">
                        <h1 id="title-ac">Sign up</h1>
                        <label>First name <sup class="red-star">*</sup>
                            <input class="input-registration" type="text" name="clientFirstname" id="fname" placeholder="First name" <?php if (isset($clientFirstname)) {
                                                                                                                                            echo "value='$clientFirstname'";
                                                                                                                                        } ?> required>
                        </label>

                        <label>Last name <sup class="red-star">*</sup>
                            <input class="input-registration" type="text" id="lname" placeholder="Last name" name="clientLastname" <?php if (isset($clientLastname)) {
                                                                                                                                        echo "value='$clientLastname'";
                                                                                                                                    }  ?> required>
                        </label>

                        <label>Enter your Email <sup class="red-star">*</sup>
                            <input class="input-registration" type="email" id="email" placeholder="Email" name="clientEmail" <?php if (isset($clientEmail)) {
                                                                                                                                    echo "value='$clientEmail'";
                                                                                                                                }  ?> required>
                        </label>

                        <label>Password <sup class="red-star">*</sup>
                            <input class="input-registration" type="password" id="password" placeholder="Password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        </label>

                        <span>At least 8 characters, at least 1 capital letter, at least 1 number and at least 1 special character.</span>
                        <button type="submit" name="submit" id="regbtn" value="Register">Sign up</button>
                        <input type="hidden" name="action" value="register">
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