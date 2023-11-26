<?php
    define("DB_HOST", 'localhost');
    define("DB_USER", 'test');
    define("DB_PASS", 'test123');
    define("DB_NAME", 'userdb');

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($connection->connect_error){
        die("Connection Failed" . $connection->connect_error);
        echo "connection faild";
    }
?>