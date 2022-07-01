<?php
    define('HOST', 'localhost');
    define('DB_NAME', 'task-manager');
    define('USER', 'root');
    define('PASS', '/Yhd5');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e;
    }
?>

