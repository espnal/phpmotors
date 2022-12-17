<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newcss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>PHP Motors</title>
</head>
<body>
    <header>
        <?php
            require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/header.php"
        ?>
    </header>
    <main>
        <div class="main-error">
            <h1>Server Error</h1>
            <p>Sorry our server seems to be experiencing some technical difficulties. Please check back later</p>
        </div>
    </main>
    <footer>
        <?php
        require $_SERVER["DOCUMENT_ROOT"]."/phpmotors/snippets/footer.php"
        ?>
    </footer>
</body>
</html>