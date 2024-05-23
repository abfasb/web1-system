<?php
// Database connection
include '../config/connection.php';
// Fetch total revenue per day
$revenueStmt = $connection->query("
    SELECT DATE(order_date) as date, SUM(total_amount) as total_revenue 
    FROM Orders 
    GROUP BY DATE(order_date)
    ORDER BY DATE(order_date)
");
$revenueData = $revenueStmt->fetchAll(PDO::FETCH_ASSOC);

// Output data as JSON
echo json_encode($revenueData);
?>
