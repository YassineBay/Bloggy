<?php
function db(){
    $dsn = 'mysql:dbname=customcms;host=127.0.0.1';
    $user = 'root';
    $password = '';
    try {
        $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        die ('Connection failed: ' . $e->getMessage());
    }  
    return $db;
}
?>