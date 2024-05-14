<?php
session_start();
include '../config/connection.php';

echo "Session User ID: ".$_SESSION['userId'];
if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    http_response_code(403);
    exit;
}

$userId = $_SESSION['userId'];
$roleUser = "Seller";
$_SESSION['Role'] = $roleUser;
$query = "UPDATE Users SET role = 'seller' WHERE user_id = ?";
$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, 'i', $userId);
mysqli_stmt_execute($statement);

echo "User role updated to seller!";
header("Location: /web1-system/views/AdminPanel.php");
?>
