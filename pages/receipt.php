<?php
include '../config/connection.php';
session_start();

$orderId = $_GET['order_id'];

$orderQuery = "SELECT * FROM Orders WHERE order_id = ?";
$orderStmt = $connection->prepare($orderQuery);
$orderStmt->execute([$orderId]);
$order = $orderStmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    header("Location: ../views/utils/error.php");
    exit();
}

$productQuery = "SELECT Products.product_name, Order_Items.quantity, Order_Items.unit_price
                 FROM Order_Items
                 INNER JOIN Products ON Order_Items.product_id = Products.product_id
                 WHERE Order_Items.order_id = ?";

function getProduct($productId, $connection) {
    $sql = "SELECT * FROM Products WHERE product_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

$productStmt = $connection->prepare($productQuery);
$productStmt->execute([$orderId]);
$products = $productStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .receipt-card {
            background-color: #f7fafc;
            border: 1px solid #edf2f7;
        }

        .receipt-header {
            background-color: #48bb78;
            color: #fff;
            padding: 1.5rem;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .receipt-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .receipt-body {
            padding: 1.5rem;
        }

        .receipt-text {
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .receipt-product {
            background-color: #edf2f7;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .receipt-product-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.25rem;
        }

        .receipt-product-text {
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .receipt-footer {
            padding: 1.5rem;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .receipt-button {
            background-color: #2d3748;
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .receipt-button:hover {
            background-color: #1a202c;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="receipt-card w-full max-w-md">
        <div class="receipt-header text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M19 10a9 9 0 11-18 0 9 9 0 0118 0zm-3.854-2.146a.5.5 0 00-.708-.708L10 12.293l-1.438-1.437a.5.5 0 00-.708.708L9.293 13 7.854 14.439a.5.5 0 00.708.708L10 13.707l1.438 1.438a.5.5 0 00.708-.708L10.707 13l1.439-1.439a.5.5 0 000-.708z" clip-rule="evenodd" />
            </svg>
            <h1 class="receipt-title">Order Submitted Successfully!</h1>
        </div>
        <div class="receipt-body">
            <div class="mb-6">
                <p class="receipt-text">Thank you for your order. Your order has been successfully submitted and is now waiting for confirmation from the seller.</p>
            </div>
            <div class="mb-6">
                <h2 class="receipt-title mb-2">Order Details</h2>
                <p class="receipt-text"><span class="font-semibold">Order ID:</span> #<?php echo $order['order_id']; ?></p>
                <p class="receipt-text"><span class="font-semibold">Date:</span> <?php echo date('M d, Y', strtotime($order['order_date'])); ?></p>
                <p class="receipt-text"><span class="font-semibold">Total:</span> ₱<?php echo number_format($order['total_amount'], 2); ?></p>
            </div>
            <div class="mb-2">
                <h2 class="receipt-title mb-2">Product Details</h2>
                <?php foreach ($products as $product) : ?>
                    <div class="receipt-product">
                        <p class="receipt-product-title"><?php echo $product['product_name']; ?></p>
                        <p class="receipt-product-text">Price: ₱<?php echo number_format($product['unit_price'], 2); ?></p>
                        <p class="receipt-product-text">Quantity: <?php echo $product['quantity']; ?></p>
                        <p class="receipt-product-text">Subtotal: ₱<?php echo number_format($product['unit_price'] * $product['quantity'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="receipt-footer text-center">
                <button class="receipt-button" onclick = "redirectOrder()">Check Order History</button>
            </div>
        </div>
    </div>

    <script>
        function redirectOrder() {
            window.location.href= "order_receipt.php";
        }
    </script>
</body>

</html>

