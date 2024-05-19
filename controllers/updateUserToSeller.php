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
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $userId, PDO::PARAM_INT);
$stmt->execute();

echo "User role updated to seller!";
header("Location: /web1-system/views/AdminPanel.php");
?>
