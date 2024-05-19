<?php
include '../config/connection.php';

session_start();
$user_id = $_SESSION['user_id'];

if (!isset($_GET['order_id'])) {
    echo "Order ID is required.";
    exit;
}

$order_id = $_GET['order_id'];

// Fetch order details
$sql = "SELECT o.*, u.email FROM Orders o
        JOIN Users u ON o.user_id = u.user_id
        WHERE o.order_id = ? AND o.user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$order_id, $user_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "Order not found.";
    exit;
}

// Fetch order items
$sql = "SELECT oi.*, p.product_name, p.images
        FROM Order_Items oi
        JOIN Products p ON oi.product_id = p.product_id
        WHERE oi.order_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$order_id]);
$order_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 mt-10">
        <h1 class="text-4xl font-bold mb-8 text-center text-indigo-600">Order Receipt</h1>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Order Details</h2>
            <div class="mb-6 border-b pb-4">
                <p class="text-lg"><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
                <p class="text-lg"><strong>Order ID:</strong> #<?= htmlspecialchars($order['order_id']) ?></p>
                <p class="text-lg"><strong>Order Date:</strong> <?= htmlspecialchars($order['order_date']) ?></p>
                <p class="text-lg"><strong>Shipping Method:</strong> <?= htmlspecialchars($order['shipping_method']) ?></p>
                <p class="text-lg"><strong>Total Amount:</strong> ₱<?= htmlspecialchars($order['total_amount']) ?></p>
            </div>
            <h2 class="text-2xl font-semibold mt-6 mb-4 text-gray-700">Products</h2>
            <ul class="divide-y divide-gray-200">
                <?php foreach ($order_items as $item) { 
                    $images = json_decode($item['images'], true);
                    $image_url = htmlspecialchars($images[0] ?? 'default_image.png');
                    $subtotal = $item['unit_price'] * $item['quantity'];
                ?>
                    <li class="py-4 flex items-center">
                        <img src="./profile/uploads/<?= $image_url ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="w-16 h-16 object-cover rounded mr-4 shadow-lg">
                        <div class="flex-1">
                            <p class="text-lg font-medium text-gray-800"><?= htmlspecialchars($item['product_name']) ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg text-gray-800">₱<?= htmlspecialchars($item['unit_price']) ?></p>
                            <p class="text-sm text-gray-600">Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
                            <p class="text-sm font-bold text-gray-800">Subtotal: ₱<?= number_format($subtotal, 2) ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <button id="cancel-order" class="mt-6 w-full bg-red-600 text-white py-3 rounded-md shadow-lg hover:bg-red-700 transition ease-in-out duration-300">Cancel Order</button>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmation-modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Cancel Order</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Are you sure you want to cancel this order? This action cannot be undone.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button id="confirm-cancel" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">Yes, Cancel Order</button>
                    <button id="close-modal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">No, Keep Order</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cancel-order').addEventListener('click', function() {
            document.getElementById('confirmation-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('confirmation-modal').classList.add('hidden');
        });

        document.getElementById('confirm-cancel').addEventListener('click', function() {
            axios.post('../controllers/cancel_order.php', { order_id: <?= json_encode($order_id) ?> })
                .then(function(response) {
                    if (response.data.success) {
                        window.location.href = 'order_history.php';
                    } else {
                        alert('Failed to cancel order.');
                        document.getElementById('confirmation-modal').classList.add('hidden');
                    }
                })
                .catch(function(error) {
                    console.error(error);
                    alert('An error occurred.');
                    document.getElementById('confirmation-modal').classList.add('hidden');
                });
        });
    </script>
</body>
</html>
