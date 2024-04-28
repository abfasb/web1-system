<?php
    include '../../config/connection.php';
    // Fetch products from the database
    $sql = "SELECT Products.product_id, Products.product_name, Products.description, Products.price, Categories.category_name, Products.images
            FROM Products
            INNER JOIN Categories ON Products.category_id = Categories.category_id";
    $result = mysqli_query($connection, $sql);
    
    // Initialize an array to store product data
    $products = [];
    
    // Fetch each row from the result set and store it in the products array
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
 
<!-- Navbar -->
<nav class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="text-xl font-bold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
            </svg>
            Your Brand
        </a>
        <!-- Search Bar -->
        <div class="flex items-center">
            <input type="text" placeholder="Search..." class="rounded-l-lg px-4 py-2 bg-gray-700 text-gray-200 focus:outline-none">
            <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-r-lg focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <!-- Cart and Wishlist -->
        <div class="flex items-center space-x-4">
            <a href="#" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>
            <a href="#" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 7c0-2.761 2.239-5 5-5s5 2.239 5 5v2c3.086 0 5.889 1.316 7.854 3.418l.146.158c.525.571 1 1.232 1.406 1.964a2 2 0 0 1-1.437 3.264H5.218a2 2 0 0 1-1.812-2.828l1.015-3.046A5.017 5.017 0 0 0 3 9V7zm9 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path>
                </svg>
            </a>
        </div>
    </div>
</nav>


<!-- Product Filter -->
<!-- Product Filter -->
<!-- Product Filter -->
<div class="bg-gray-100 py-8">
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <!-- Categories with Icons -->
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Electronics</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Clothing</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Books</span>
            </button>
            <!-- Add more category buttons here with icons -->
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Home & Kitchen</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Sports & Outdoors</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Health & Beauty</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Toys & Games</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Automotive</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Tools & Home Improvement</span>
            </button>
            <button class="flex items-center space-x-2 bg-white text-gray-800 px-6 py-3 rounded-lg shadow mx-2 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm2 7H8v2h4v-2z" clip-rule="evenodd" />
                </svg>
                <span>Grocery & Gourmet Food</span>
            </button>
        </div>
    </div>
</div>



<!-- Product Cards -->
<div id="products-wrapper" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($products as $product): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <?php
                // Decode the JSON string into an array of image URLs
                $images = json_decode($product['images'], true);
                // Use the first image as the product image
                $product_image = '../../pages/profile/uploads/' . $images[0]; // Assuming the first image is the main product image
                ?>
                <img class="object-cover object-center w-full p-2 rounded-lg" src="<?php echo $product_image; ?>" alt="<?php echo $product['product_name']; ?>">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900"><?php echo $product['product_name']; ?></h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-gray-900 font-bold">$<?php echo number_format($product['price'], 2); ?></span>
                        <button class="px-4 py-2 bg-blue-500 text-white text-xs font-semibold rounded focus:outline-none focus:bg-blue-600 add-to-cart-button">Add to Cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <script>
        let addToCartButtons = document.querySelectorAll('.add-to-cart-button');

         addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Redirect to ../cart.php
            window.location.href = '../cart/cartComponent.php';
        });
    });
    </script>

</body>
</html>