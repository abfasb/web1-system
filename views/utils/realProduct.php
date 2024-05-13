<?php
include '../../config/connection.php';
include '../../model/ProductModel.php';

session_start();

$productModel = new ProductModel($connection);
$products = $productModel->getAllProducts();
$categories = $productModel->getSortedCategories();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><script></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
         .product-card {
        height: 400px; /* Set a fixed height for the product cards */
        display: flex;
        flex-direction: column;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        overflow: hidden; /* Prevent overflow content from protruding */
    }

    .product-image {
        flex: 1; /* Let the image take up remaining space */
        object-fit: cover; /* Cover the entire space */
    }

    .product-details {
        padding: 1rem;
        background-color: #f8fafc; /* Add a background color for the details */
    }

    .product-name {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: auto; /* Push the price to the bottom */
    }
    </style>
</head>
<body>
<div class="container mx-auto flex flex-col lg:flex-row">
        <!-- Sidebar for filters -->
        <div class="w-full lg:w-1/4 bg-gray-100 p-4">
            <h2 class="text-lg font-bold mb-4">Filters</h2>
            <!-- Category filter -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Category</h3>
                <select class="w-full border rounded px-3 py-2">
                    <option>All</option>
                    <option>Category 1</option>
                    <option>Category 2</option>
                    <option>Category 3</option>
                </select>
            </div>
            <!-- Price range filter -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Price Range</h3>
                <div class="flex items-center">
                    <span class="mr-2">$</span>
                    <input type="text" id="price-min" class="w-1/2 border rounded px-3 py-2 mr-2" placeholder="Min">
                    <span class="mr-2">-</span>
                    <input type="text" id="price-max" class="w-1/2 border rounded px-3 py-2" placeholder="Max">
                </div>
            </div>
            <!-- Brand filter -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Brand</h3>
                <div class="flex flex-col">
                    <label><input type="checkbox" class="mr-2">Brand 1</label>
                    <label><input type="checkbox" class="mr-2">Brand 2</label>
                    <label><input type="checkbox" class="mr-2">Brand 3</label>
                </div>
            </div>
            <!-- Sort by -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Sort By</h3>
                <select class="w-full border rounded px-3 py-2">
                    <option>Best Match</option>
                    <option>Price Low to High</option>
                    <option>Price High to Low</option>
                    <option>Newest Arrivals</option>
                </select>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Apply Filters</button>
        </div>
        <!-- Product list -->
        <div class="w-full lg:w-3/4 p-4">
            <!-- Product cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Sample product card (repeat for each product) -->
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#" class="block">
                        <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-blue-500">Product Name</a>
                        <p class="mt-2 text-sm text-gray-700">Product Description</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$99.99</span>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#" class="block">
                        <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-blue-500">Product Name</a>
                        <p class="mt-2 text-sm text-gray-700">Product Description</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$99.99</span>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#" class="block">
                        <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-blue-500">Product Name</a>
                        <p class="mt-2 text-sm text-gray-700">Product Description</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$99.99</span>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#" class="block">
                        <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-blue-500">Product Name</a>
                        <p class="mt-2 text-sm text-gray-700">Product Description</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$99.99</span>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#" class="block">
                        <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-blue-500">Product Name</a>
                        <p class="mt-2 text-sm text-gray-700">Product Description</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$99.99</span>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <!-- Repeat product card for each product -->
            </div>
        </div>
    </div>
    
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <button type="button" class="category-button text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800" data-category-id="all">All categories</button>
    <?php foreach ($categories as $category): ?>
        <button type="button" class="category-button text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800" data-category-id="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></button>
    <?php endforeach; ?>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4 m-14 products-container">
    <?php foreach ($products as $product): ?>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 product-card" data-category-id="<?php echo $product['category_id'] ?>">
            <a href="../viewProduct.php?product_id=<?php echo $product['product_id']; ?>">
                <?php
                // Decode the JSON string into an array of image URLs
                $images = json_decode($product['images'], true);
                // Use the first image as the product image
                $product_image = '../../pages/profile/uploads/' . $images[0]; // Assuming the first image is the main product image
                ?>
                <img class="p-8 rounded-t-lg product-image" src="<?php echo $product_image; ?>" alt="<?php echo $product['product_name']; ?>" />
            </a>
            <div class="px-5 pb-5 product-details">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white product-name"><?php echo $product['product_name']; ?></h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <?php
                    $rating = 5.0;
                    for ($i = 0; $i < 5; $i++) {
                        if ($rating >= 1) {
                            echo '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                        } else {
                            echo '<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                        }
                        $rating--;
                    }
                    ?>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?php echo "5.0" ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white product-price">$<?php echo number_format($product['price'], 2); ?></span>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<div class = " w-full flex items-center justify-center mb-4">
        
<nav aria-label="Page navigation example">
  <ul class="flex items-center -space-x-px h-10 text-base">
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Previous</span>
        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
      </a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
    </li>
    <li>
      <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Next</span>
        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </li>
  </ul>
</nav>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-button');
        const productCards = document.querySelectorAll('.product-card');

        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.dataset.categoryId;
                filterProducts(categoryId);
            });
        });

        function filterProducts(categoryId) {
            productCards.forEach(card => {
                const cardCategoryId = card.dataset.categoryId;
                if (categoryId === 'all' || cardCategoryId === categoryId) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    });
</script>
</body>
</html>