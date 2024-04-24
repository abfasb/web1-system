<?php
session_start();
include '../config/connection.php';

echo "Session User ID: ".$_SESSION['userId'];
// Check if user is logged in
if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    http_response_code(403); // Forbidden
    exit;
}

// Update user's role to "seller"
$userId = $_SESSION['userId'];
$query = "UPDATE Users SET role = 'seller' WHERE user_id = ?";
$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, 'i', $userId);
mysqli_stmt_execute($statement);

echo "User role updated to seller!";
?>
