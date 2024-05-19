<?php
// Assuming you have already started the session and connected to the database
include '../config/connection.php';
session_start();

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Assuming you have a cart table and a way to identify the user's cart
    $user_id = $_SESSION['user_id'];

    // Remove product from the cart
    $sql = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->closeCursor(); // Optional, closes the cursor
    $connection = null; // Optional, closes the connection
}
?>
