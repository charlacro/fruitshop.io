<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "fruitshop");
    define("DB_PORT", "3307");
 
    $connection = mysqli_connect(
        DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT
    );

    if(mysqli_connect_error()) {
        echo "Unable to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>
