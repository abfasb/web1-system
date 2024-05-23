<?php
// your-backend-endpoint-for-fetching-order-details.php

// Include your database connection
include '../../config/connection.php';

// Get the orderId from the POST data
$orderId = $_POST['orderId'];

// Prepare and execute a query to fetch the order details
$stmt = $pdo->prepare('SELECT * FROM Orders WHERE order_id = :orderId');
$stmt->execute(['orderId' => $orderId]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// Prepare the response data
$response = [
    'product_name' => $order['product_name'],
    'price' => $order['price'],
    'description' => $order['description'],
    'images' => json_decode($order['images'], true) // Assuming images are stored as a JSON array in the database
];

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
