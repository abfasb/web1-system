<?php
// Assuming you have already started the session and connected to the database
include '../config/connection.php';
session_start();

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    
    // Assuming you have a cart table and a way to identify the user's cart
    $user_id = $_SESSION['user_id'];
    
    // Remove product from the cart
    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ii', $user_id, $product_id);
    
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $connection->close();
}
?>
