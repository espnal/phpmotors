<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
$classificationListUpdate = "<select name='classificationId' class='option-add-v'>";
$classificationListUpdate .= "<option value='0'>Choose a Classification</option>";
foreach ($classifications as $classification) {
    $classificationListUpdate .= "<option value='$classification[classificationId]'";
    if (isset($classType)) {
        if ($classification["classificationId"] == $classType) {
            $classificationListUpdate .= " selected ";
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classificationListUpdate .= ' selected ';
        }
    };
    $classificationListUpdate .=  ">$classification[classificationName]</option>";
}
$classificationListUpdate .= "</select>";
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
    <title>
        <?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Modify $invInfo[invMake] $invInfo[invModel]";
        } elseif (isset($invMake) && isset($invModel)) {
            echo "Modify $invMake $invModel";
        } ?>| PHP Motors
    </title>
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
                var_dump($_SESSION['clientData']['clientLevel'])
                ?>
                <h1>
                    <?php
                    if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                        echo "Modify $invInfo[invMake] $invInfo[invModel]";
                    } elseif (isset($invMake) && isset($invModel)) {
                        echo "Modify$invMake $invModel";
                    }
                    ?>
                </h1>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="form-div">
                    <p class="add-v-note"><sup>*</sup>Note all Fields are Required</p>

                    <form class="form" action="/phpmotors/vehicles/index.php" method="post">
                        <?php
                        echo $classificationListUpdate
                        ?>
                        <label>
                            Make
                            <input class="input-registration" type="text" name="invMake" <?php if (isset($invMake)) {
                                                                                                echo "value='$invMake'";
                                                                                            } elseif (isset($invInfo['invMake'])) {
                                                                                                echo "value='$invInfo[invMake]'";
                                                                                            } ?>required>
                        </label>
                        <label>
                            Model
                            <input class="input-registration" type="text" name="invModel" <?php if (isset($invModel)) {
                                                                                                echo "value='$invModel'";
                                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                                echo "value='$invInfo[invModel]'";
                                                                                            } ?>required>

                            <label>
                                Description
                                <textarea class="textarea-add-v" name="invDescription" required><?php if (isset($invDescription)) {
                                                                                                    echo $invDescription;
                                                                                                } elseif (isset($invInfo['invDescription'])) {
                                                                                                    echo $invInfo['invDescription'];
                                                                                                } ?></textarea>
                            </label>
                            <label>
                                Image Path
                                <input class="input-registration" type="text" name="invImage" <?php if (isset($invImage)) {
                                                                                                    echo "value='$invImage'";
                                                                                                } elseif (isset($invInfo['invImage'])) {
                                                                                                    echo "value='$invInfo[invImage]'";
                                                                                                } ?> required>

                            </label>
                            <label>
                                Thumbnail Path
                                <input class="input-registration" type="text" name="invThumbnail" <?php if (isset($invThumbnail)) {
                                                                                                        echo "value='$invThumbnail'";
                                                                                                    } elseif (isset($invInfo['invThumbnail'])) {
                                                                                                        echo "value='$invInfo[invThumbnail]'";
                                                                                                    } ?> required>

                            </label>
                            <label>
                                Price
                                <input class="input-registration" type="text" name="invPrice" <?php if (isset($invPrice)) {
                                                                                                    echo "value='$invPrice'";
                                                                                                } elseif (isset($invInfo['invPrice'])) {
                                                                                                    echo "value='$invInfo[invPrice]'";
                                                                                                } ?> required>

                            </label>
                            <label>
                                # In Stock
                                <input class="input-registration" type="text" name="invStock" <?php if (isset($invStock)) {
                                                                                                    echo "value='$invStock'";
                                                                                                } elseif (isset($invInfo['invStock'])) {
                                                                                                    echo "value='$invInfo[invStock]'";
                                                                                                } ?> required>

                            </label>
                            <label>
                                Color
                                <input class="input-registration" type="text" name="invColor" <?php if (isset($invColor)) {
                                                                                                    echo "value='$invColor'";
                                                                                                } elseif (isset($invInfo['invColor'])) {
                                                                                                    echo "value='$invInfo[invColor]'";
                                                                                                } ?> required>

                            </label>
                            <button class="add-v-button" type="submit">Update Vehicle</button>
                            <a id="goBack" href="/phpmotors/vehicles/index.php">Go back<i class="fa-solid fa-circle-left"></i></a>
                            <input type="hidden" name="action" value="updateVehicle">
                            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                            echo $invInfo['invId'];
                                                                        } elseif (isset($invId)) {
                                                                            echo $invId;
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