<?php
include '../config/connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('Location: login.php');
    exit;
}

// Fetch reviews
$sql = "SELECT r.*, p.product_name, u.username
        FROM Reviews r
        JOIN Products p ON r.product_id = p.product_id
        JOIN Users u ON r.user_id = u.user_id
        WHERE r.user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$user_id]);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch products for the review form
$sql = "SELECT product_id, product_name FROM Products WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$user_id]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $sql = "INSERT INTO Reviews (product_id, user_id, rating, review_text) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$product_id, $user_id, $rating, $review_text]);

    header('Location: reviews_panel.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 mt-10">
        <h1 class="text-4xl font-bold mb-8 text-center text-indigo-600">My Reviews</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Write a Review</h2>
                <form action="" method="POST" class="space-y-4">
                    <div>
                        <label for="product_id" class="block text-lg text-gray-700">Product</label>
                        <select id="product_id" name="product_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                            <?php foreach ($products as $product) : ?>
                                <option value="<?= htmlspecialchars($product['product_id']) ?>"><?= htmlspecialchars($product['product_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="rating" class="block text-lg text-gray-700">Rating</label>
                        <select id="rating" name="rating" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                            <option value="1">1 - Very Poor</option>
                            <option value="2">2 - Poor</option>
                            <option value="3">3 - Average</option>
                            <option value="4">4 - Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>
                    <div>
                        <label for="review_text" class="block text-lg text-gray-700">Review</label>
                        <textarea id="review_text" name="review_text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" rows="4"></textarea>
                    </div>
                    <button type="submit" name="submit_review" class="w-full bg-indigo-600 text-white py-3 rounded-md shadow-lg hover:bg-indigo-700 transition ease-in-out duration-300">Submit Review</button>
                </form>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">My Reviews</h2>
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($reviews as $review) : ?>
                        <li class="py-4">
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-800"><?= htmlspecialchars($review['product_name']) ?></h3>
                                    <p class="text-sm text-gray-600">by <?= htmlspecialchars($review['username']) ?></p>
                                    <p class="text-sm text-gray-600">Rating: <?= htmlspecialchars($review['rating']) ?></p>
                                    <p class="text-sm text-gray-800 mt-2"><?= nl2br(htmlspecialchars($review['review_text'])) ?></p>
                                    <p class="text-sm text-gray-500 mt-1">Reviewed on <?= htmlspecialchars($review['review_date']) ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <?php if (empty($reviews)) : ?>
                        <li class="py-4">
                            <p class="text-center text-gray-500">No reviews yet.</p>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
