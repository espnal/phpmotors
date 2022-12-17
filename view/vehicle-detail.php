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
    <title><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?> | PHP Motors, Inc.</title>
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
                <h1>
                    <?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?></h1>
                <?php if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="detail-section">
                    <?php
                    if (isset($thumbnailsList)) {
                        echo $thumbnailsList;
                    }
                    ?>
                    <?php if (isset($vehicleHTML)) {
                        echo $vehicleHTML;
                    }
                    ?>
                </div>
                <div class="review-section">
                    <h2>Customer Reviews</h2>
                    <?php

                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }


                    ?>
                    <?php if (isset($_SESSION["loggedin"])) {

                    ?>
                        <?php if (isset($clientUsername)) {
                            echo $clientUsername;
                        } ?>
                        <div class="form-div-review">
                            <form action="/phpmotors/reviews/index.php" method="POST">
                                <label>Review the <?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?>

                                    <textarea id="review" name="newReview" placeholder="Enter your review..." rows="8" <?php if (isset($clientFirstname)) {
                                                                                                                            echo "value='$clientFirstname'";
                                                                                                                        }  ?> required></textarea></label>
                                <br>
                                <button id="rbtn" type="submit" name="submit">Add Review</button>
                                <input type="hidden" name="action" value="newReview">




                                <?php echo  "<input type='hidden' name='userId' value='{$_SESSION['clientData']['clientId']}'>"; ?>


                                <input type="hidden" name="carId" <?php echo 'value="' . $vehicleId . '"' ?>>
                            </form>
                        </div>
                    <?php
                    } else {
                        echo '<p>First <a href = "/phpmotors/accounts/index.php?action=login">login</a> to create a review.</p>';
                    }
                    ?>
                    <?php
                    echo $previousReviews
                    ?>

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