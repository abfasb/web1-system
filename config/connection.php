<?php
    define('host', 'localhost');
    define('user', 'root');
    define('password', '');
    define('database', 'webDb');

    $connection = mysqli_connect($host, $user, $password, $database) or die('Error: ' .mysqli_error());
?>