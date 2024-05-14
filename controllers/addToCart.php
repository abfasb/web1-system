<?php

include '../config/connection.php';

session_start();

$user_id = $_SESSION['user_id'];

// Check if product_id is provided and if color and size are selected
if (isset($_POST['product_id']) && isset($_POST['colors']) && isset($_POST['sizes'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $colors = $_POST['colors'];
    $sizes = $_POST['sizes'];

    // Create an array to store sizes and colors
    $attributes = array('sizes' => $sizes, 'colors' => $colors);

    // Convert the array to JSON format
    $attributes_json = json_encode($attributes);

    // Add the product to the cart table
    $query = "INSERT INTO Cart (user_id, product_id, quantity, attributes) VALUES (?, ?, 1, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iis", $user_id, $product_id, $attributes_json);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    mysqli_close($connection);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'missing_data';
}

?>
