<?php
include '../config/connection.php';

session_start();
$user_id = $_SESSION['user_id'];

$data = json_decode(file_get_contents('php://input'), true);
$order_id = $data['order_id'];

$sql = "SELECT * FROM Orders WHERE order_id = ? AND user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$order_id, $user_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo json_encode(['success' => false, 'message' => 'Order not found or access denied.']);
    exit;
}

$sql = "UPDATE Orders SET status = 'cancelled' WHERE order_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$order_id]);

echo json_encode(['success' => true, 'message' => 'Order cancelled successfully.']);
?>
