<?php
include '../config/connection.php';

session_start();
$userInitial = strtoupper(substr($_SESSION['Username'], 0, 1));
$userName =  $_SESSION['Username'];
$emailAddress = $_SESSION['Email'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM Orders WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$totalOrders = $orders;
$activeOrders = array_filter($orders, function($order) { return $order['status'] == 'active'; });
$completedOrders = array_filter($orders, function($order) { return $order['status'] == 'completed'; });
$cancelledOrders = array_filter($orders, function($order) { return $order['status'] == 'cancelled'; });


$sql = "SELECT o.*, p.product_name, p.images
        FROM Orders o
        JOIN Order_Items oi ON o.order_id = oi.order_id
        JOIN Products p ON oi.product_id = p.product_id
        WHERE o.user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$totalOrders = $orders;
$activeOrders = array_filter($orders, function($order) { return $order['status'] == 'active'; });
$completedOrders = array_filter($orders, function($order) { return $order['status'] == 'completed'; });
$cancelledOrders = array_filter($orders, function($order) { return $order['status'] == 'cancelled'; });
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-8 mt-10">
        <h1 class="text-4xl font-bold mb-8">Order History</h1>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex">
                    <a id="total-orders-link" href="#" class="nav-link w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 text-indigo-600 text-lg">
                        Total Orders
                        <span class="ml-2 text-sm text-gray-500"><?= count($orders) ?></span>
                    </a>
                    <a id="active-orders-link" href="#" class="nav-link w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                        Active Orders
                        <span class="ml-2 text-sm text-gray-500"><?= count($activeOrders) ?></span>
                    </a>
                    <a id="completed-orders-link" href="#" class="nav-link w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                        Completed
                        <span class="ml-2 text-sm text-gray-500"><?= count($completedOrders) ?></span>
                    </a>
                    <a id="cancelled-orders-link" href="#" class="nav-link w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                        Cancelled
                        <span class="ml-2 text-sm text-gray-500"><?= count($cancelledOrders) ?></span>
                    </a>
                </nav>
            </div>
            <div id="total-orders" class="px-4 py-5 sm:px-6">
                <h3 class="text-2xl font-medium leading-6 text-gray-900">Total Orders Content</h3>
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($totalOrders as $order) { 
                        $productImages = json_decode($order['images'], true); 
                        $imageUrl = $productImages[0] ?? 'default-image-url.jpg'; // Use a default image URL if not available
                    ?>
                        <li>
                            <a href="order_history.php?order_id=<?= $order['order_id'] ?>" class="block hover:bg-gray-50">
                                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <img src="./profile/uploads/<?= $imageUrl ?>" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                        <div class="ml-4 flex flex-col">
                                            <span class="text-xl font-bold text-gray-900">₱<?= $order['total_amount'] ?></span>
                                            <span class="text-base text-green-600"><?= $order['status'] ?></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col text-right">
                                        <span class="text-lg font-medium text-indigo-600">#<?= $order['order_id'] ?></span>
                                        <span class="text-lg text-gray-500"><?= $order['created_at'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="active-orders" class="px-4 py-5 sm:px-6" style="display:none;">
                <h3 class="text-2xl font-medium leading-6 text-gray-900">Active Orders Content</h3>
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($activeOrders as $order) { 
                        $productImages = json_decode($order['images'], true); 
                        $imageUrl = $productImages[0] ?? 'default-image-url.jpg';
                    ?>
                        <li>
                            <a href="order_history.php?order_id=<?= $order['order_id'] ?>" class="block hover:bg-gray-50">
                                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <img src="./profile/uploads/<?= $imageUrl ?>" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                        <div class="ml-4 flex flex-col">
                                            <span class="text-xl font-bold text-gray-900"><?= $order['total_amount'] ?></span>
                                            <span class="text-base text-green-600"><?= $order['status'] ?></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col text-right">
                                        <span class="text-lg font-medium text-indigo-600">#<?= $order['order_id'] ?></span>
                                        <span class="text-lg text-gray-500"><?= $order['created_at'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="completed-orders" class="px-4 py-5 sm:px-6" style="display:none;">
                <h3 class="text-2xl font-medium leading-6 text-gray-900">Completed Orders Content</h3>
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($completedOrders as $order) { 
                        $productImages = json_decode($order['images'], true); 
                        $imageUrl = $productImages[0] ?? 'default-image-url.jpg';
                    ?>
                        <li>
                            <a href="order_history.php?order_id=<?= $order['order_id'] ?>" class="block hover:bg-gray-50">
                                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <img src="./profile/uploads/<?= $imageUrl ?>" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                        <div class="ml-4 flex flex-col">
                                            <span class="text-xl font-bold text-gray-900"><?= $order['total_amount'] ?></span>
                                            <span class="text-base text-green-600"><?= $order['status'] ?></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col text-right">
                                        <span class="text-lg font-medium text-indigo-600">#<?= $order['order_id'] ?></span>
                                        <span class="text-lg text-gray-500"><?= $order['created_at'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="cancelled-orders" class="px-4 py-5 sm:px-6" style="display:none;">
                <h3 class="text-2xl font-medium leading-6 text-gray-900">Cancelled Orders Content</h3>
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($cancelledOrders as $order) { 
                        $productImages = json_decode($order['images'], true); 
                        $imageUrl = $productImages[0] ?? 'default-image-url.jpg';
                    ?>
                        <li>
                            <a href="order_history.php?order_id=<?= $order['order_id'] ?>" class="block hover:bg-gray-50">
                                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                                    <div class="flex items-center">
                                        <img src="./profile/uploads/<?= $imageUrl ?>" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                        <div class="ml-4 flex flex-col">
                                            <span class="text-xl font-bold text-gray-900"><?= $order['total_amount'] ?></span>
                                            <span class="text-base text-red-600"><?= $order['status'] ?></span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col text-right">
                                        <span class="text-lg font-medium text-indigo-600">#<?= $order['order_id'] ?></span>
                                        <span class="text-lg text-gray-500"><?= $order['created_at'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const totalOrders = document.getElementById("total-orders");
        const activeOrders = document.getElementById("active-orders");
        const completedOrders = document.getElementById("completed-orders");
        const cancelledOrders = document.getElementById("cancelled-orders");

        function hideAllOrders() {
            activeOrders.style.display = "none";
            completedOrders.style.display = "none";
            cancelledOrders.style.display = "none";
        }

        hideAllOrders(); // Hide all orders initially

        document.getElementById("total-orders-link").addEventListener("click", function() {
            hideAllOrders();
            totalOrders.style.display = "block";
        });

        document.getElementById("active-orders-link").addEventListener("click", function() {
            hideAllOrders();
            activeOrders.style.display = "block";
            totalOrders.style.display = "none";

        });

        document.getElementById("completed-orders-link").addEventListener("click", function() {
            hideAllOrders();
            completedOrders.style.display = "block";
            totalOrders.style.display = "none";

        });

        document.getElementById("cancelled-orders-link").addEventListener("click", function() {
            hideAllOrders();
            cancelledOrders.style.display = "block";
            totalOrders.style.display = "none";

        });
    });
    document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function(link) {
        link.addEventListener("click", function() {
            navLinks.forEach(function(navLink) {
                navLink.classList.remove("text-indigo-600");
            });
            this.classList.add("text-indigo-600");
        });
    });
});

</script>
</body>
</html>


