<?php 
include '../config/connection.php';
session_start();

try {
    $sql = "SELECT user_id, username FROM Users WHERE role = 'seller'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $sellers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<script>console.error('Error:', '" . $e->getMessage() . "');</script>";
}

$query = "SELECT product_id, product_name, description, price, images, created_at 
          FROM Products 
          ORDER BY created_at DESC 
          LIMIT 6";
$stmt = $connection->prepare($query);
$stmt->execute();
$new_arrivals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="bg-gray-100 font-sans">

    <?php include 'navTry.php'?>

    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-800">New Arrivals</h1>
        </div>
    </header>

    <main class="container mx-auto my-8 px-4">
    <div class="container mx-auto my-10 p-5 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">New Arrivals</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($new_arrivals as $product): ?>
            <div class="p-6 border border-gray-200 rounded-lg shadow-md">
                <img src="../pages/profile/uploads/<?php echo htmlspecialchars(json_decode($product['images'])[0]); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="object-cover w-full h-48">
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($product['product_name']); ?></h3>
                    <p class="mt-2 text-gray-600"><?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?>...</p>
                    <p class="mt-2 font-bold text-gray-800">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
                    <p class="mt-2 text-sm text-gray-400"><?php echo htmlspecialchars(date('F j, Y', strtotime($product['created_at']))); ?></p>
<a href = "./viewProduct.php?product_id=<?php echo $product['product_id']; ?>" class="px-4 mt-4 py-2 w-full bg-blue-500 text-white rounded-md hover:bg-blue-600">Add to Cart</a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
        <section class="mt-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Sellers</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($sellers as $seller): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($seller['username']) ?></h2>
                    <a href="seller_products.php?seller_id=<?= $seller['user_id'] ?>" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 inline-block">View Products</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    </main>

</body>
</html>