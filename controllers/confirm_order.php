<?php
include '../config/connection.php';


if (isset($_POST['orderId']) && !empty($_POST['orderId'])) {
            $orderId = $_POST['orderId'];

            $sql = "UPDATE Orders SET status = 'active' WHERE order_id = :orderId";
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Order status updated successfully";
        } else {
            echo "Error updating order status";
        }


} else {
    // Handle invalid or missing orderId
    echo "Invalid order ID";
}
?>
