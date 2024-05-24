<?php

include '../config/connection.php';

session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['product_id']) && isset($_POST['colors']) && isset($_POST['sizes'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $colors = $_POST['colors'];
    $sizes = $_POST['sizes'];

    $attributes = array('sizes' => $sizes, 'colors' => $colors);

    $attributes_json = json_encode($attributes);

    $query = "INSERT INTO Cart (user_id, product_id, quantity, attributes) VALUES (?, ?, 1, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $product_id, PDO::PARAM_INT);
    $stmt->bindParam(3, $attributes_json, PDO::PARAM_STR);
    $result = $stmt->execute();

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'missing_data';
}

?>
