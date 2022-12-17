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
    <title>Confirm review deleted</title>
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
                <h1>Confirm Delete</h1>
                <p>
                    Do you want to delete this post?
                </p>
                <?php
                if (isset($message)) {
                    echo $message;
                } ?>
                <div class="form-div-update">
                    <form action="/phpmotors/reviews/index.php" method="POST" <?php if (!$_SESSION['loggedin']) {
                                                                                    echo "hidden";
                                                                                } ?>>
                        <label>Name as it appears
                            <br>
                            <input name="clientname" id="clientname" type="text" <?php echo 'value="' . substr($review['clientFirstname'], 0, 1) . ". " . $review['clientLastname'] . '"'; ?> readonly>
                        </label>
                        <br>
                        <br>
                        <label>Review posted on
                            <br>
                            <input name="date" id="date" type="text" <?php echo 'value="' . $review['reviewDate'] . '"'; ?> readonly>
                        </label>
                        <br>
                        <br>
                        <label>Review
                            <br>
                            <textarea id="review" name="newReview" rows="4" cols="50" readonly><?php echo $review['reviewText'];  ?></textarea>
                        </label>
                        <br>
                        <button type="submit" name="submit">Delete Review</button>
                        <input type="hidden" name="action" value="deleteReview">
                        <input type="hidden" name="review" <?php echo 'value="' . $reviewId . '"' ?>>
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

</html>
<?php unset($_SESSION['message']); ?>