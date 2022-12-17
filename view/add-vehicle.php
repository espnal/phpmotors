<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
$classificationList = "<select name='carClassifications' class='option-add-v'>";
$classificationList .= "<option value='0'>Choose a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classType)) {
        if ($classification["classificationId"] == $classType) {
            $classificationList .= " selected ";
        };
    }
    $classificationList .=  ">$classification[classificationName]</option>";
}
$classificationList .= "</select>";
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
    <title>Add vehicles PHP motors</title>
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
                <h1>Add Vehicle</h1>
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
                            <input class="input-registration" type="text" name="make" id="make" <?php if (isset($make)) {
                                                                                                    echo "value='$make'";
                                                                                                } ?> required>

                        </label>
                        <label>
                            Model
                            <input class="input-registration" type="text" name="model" id="model" <?php if (isset($model)) {
                                                                                                        echo "value='$model'";
                                                                                                    } ?> required>

                        </label>
                        <label>
                            Description
                            <textarea class="textarea-add-v" name="description" required><?php if (isset($description)) {
                                                                                                echo $description;
                                                                                            } ?></textarea>
                        </label>
                        <label>
                            Image Path
                            <input class="input-registration" type="text" name="image" id="image" <?php if (isset($image)) {
                                                                                                        echo "value='$image'";
                                                                                                    } ?> required>

                        </label>
                        <label>
                            Thumbnail Path
                            <input class="input-registration" type="text" name="thumb" id="thumb" <?php if (isset($thumb)) {
                                                                                                        echo "value='$thumb'";
                                                                                                    } ?> required>

                        </label>
                        <label>
                            Price
                            <input class="input-registration" type="text" name="price" id="price" <?php if (isset($price)) {
                                                                                                        echo "value='$price'";
                                                                                                    } ?> required>

                        </label>
                        <label>
                            # In Stock
                            <input class="input-registration" type="text" name="stock" id="stock" <?php if (isset($stock)) {
                                                                                                        echo "value='$stock'";
                                                                                                    } ?> required>

                        </label>
                        <label>
                            Color
                            <input class="input-registration" type="text" name="color" id="color" <?php if (isset($color)) {
                                                                                                        echo "value='$color'";
                                                                                                    } ?> required>

                        </label>
                        <button class="add-v-button" type="submit" name="submit">Add Vehicle</button>
                        <a id="goBack" href="/phpmotors/vehicles/index.php">Go back<i class="fa-solid fa-circle-left"></i></a>
                        <input type="hidden" name="action" value="addVehicle">
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