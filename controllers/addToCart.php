<?php

include '../config/connection.php';

session_start();

// Check if product_id is provided and if color and size are selected
if (isset($_POST['product_id']) && isset($_POST['color']) && isset($_POST['size'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];
    $color = $_POST['colors'];
    $size = $_POST['sizes'];

    // Add the product to the cart table
    $query = "INSERT INTO Cart (user_id, product_id, quantity, color, size) VALUES (?, ?, 1, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iiss", $user_id, $product_id, $color, $size);
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
