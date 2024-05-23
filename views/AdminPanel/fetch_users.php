<?php
    include '../../config/connection.php';


    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch users from database
    $stmt = $pdo->query('SELECT * FROM Users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return users as JSON
    echo json_encode(['users' => $users]);

?>
