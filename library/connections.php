<?php

function phpmotorsConnect()
{
    $server = "localhost";
    $dbname = "phpmotors";
    $username = "iClient";
    $password = "i(GQiMrfulnvUo!6";
    $dsn = 'mysql:host=' . $server . ';dbname=' . $dbname;
    // $dsn = "mysql:host=$server;dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $link = new PDO($dsn, $username, $password, $options);
        if (is_object($link)) {
            return $link;
        }
    } catch (PDOException $e) {
        header("Location: /phpmotors/view/500.php");
        exit;
    }
}
