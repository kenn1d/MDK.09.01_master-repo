<?php 
    define("DB_SERVER", "localhost");
    define("DB_USER", "defaultUser");
    define("DB_PASS", "qwerty123");
    define("DB_NAME", "userlistdb");

    $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die (mysqli_error());
?>