<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newcss.css" type="text/css" media="screen">
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
                    require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/header.php"
                ?>
                <nav>
                <?php
                        // require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/nav.php"
                        echo $navList;
                ?>
                </nav>

                    <h1>Welcome to PHP Motors</h1>
                <div class="banner-phpmotors">
                    
                    <div class="text-button">
                        <h2>DMC Delorean</h2>
                        <P>3 Cup holders Superman doors Fuzzy dice!</P>
                    </div>
                    <button id="banner-button">Own Today</button>
                </div>
            </header>
            <main>
                <div class="main-content-div">
                    <div class="delorean-div">
                        <h2>DMC Delorean Reviews</h2>
                        <ul>
                            <li>"So fast its almost like traveling in time." (4/5)</li>
                            <li>"Coolest ride on the road." (4/5)</li>
                            <li>"I'm feeling Marty Mcfly!" (5/5)</li>
                            <li>"The most futuristic ride of our day" (4.5/5)</li>
                            <li>"80's living and I love it." (5/5)"</li>
                        </ul>
                    </div>
                    <div class="upgrades-div">
                        <div class="img-content-div">
                            <div class="img-div">
                            <img src="images/upgrades/flux-cap.png" alt="flux">
                            </div>
                            <a href="">Flux Capacitor</a>
                        </div>
                        <div class="img-content-div">
                            <div class="img-div">
                            <img src="images/upgrades/flame.jpg" alt="flame">
                            </div>
                            <a href="">Flame Decals</a>
                        </div>
                        <div class="img-content-div">
                            <div class="img-div">
                            <img src="images/upgrades/bumper_sticker.jpg" alt="bumper_sticker">
                            </div>
                            <a href="">Bumper Stickers</a>
                        </div>
                        <div class="img-content-div">
                            <div class="img-div">
                            <img src="images/upgrades/hub-cap.jpg" alt="hub">
                            </div>
                            <a href="">Hub Caps</a>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
            <?php
                require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/footer.php"
                ?>
            </footer>
        </div>
    </div>
</body>
</html>