<?php
    $host = 'localhost';
    $database = 'webDb';
    $username = 'root';
    $password = '';

    try {
        $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        // Set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?>
