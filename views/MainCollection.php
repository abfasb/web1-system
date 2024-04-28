<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .search-bar {
            width: 450px; /* Adjust width as needed */
            padding: 8px; /* Add padding */
            border: 1px solid #ccc; /* Add border */
            border-radius: 999px; /* Add rounded corners */
        }
        /* Custom styles */
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 25%;
            background-color: #f7fafc;
            padding: 1rem;
            overflow-y: auto;
        }

        /* Product list styles */
        .product-list {
            margin-left: 25%; /* Same width as the sidebar */
            padding: 1rem;
        }

        /* Product card styles */
        .product-card {
            background-color: #ffffff;
            border: 1px solid #edf2f7;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            object-fit: cover;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            height: 200px;
        }

        .product-card-content {
            padding: 1rem;
        }

        .product-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .product-card-description {
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .product-card-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
        }

        .product-card-button {
            background-color: #2b6cb0;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product-card-button:hover {
            background-color: #2c5282;
        }

        /* Cart and wishlist styles */
        .cart-wishlist {
            position: relative;
        }

        .cart-wishlist .count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #2b6cb0;
            color: #ffffff;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
<nav class="bg-black border-gray-200 dark:bg-gray-900" style = "position: fixed; top: 0; width: 100%;">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="./MainHome.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../assets/img/logoooo.png" class="h-8" alt="ShopSphere Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ShopSphere</span>
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
    <span class="font-medium text-gray-600 dark:text-gray-300"><?php echo $userInitial ?></span>
</div>
      </button>
      <!-- Dropdown menu -->
      <div class="hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 z-50" id="user-dropdown">
        <div class="px-4 py-3 z-50">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $userName ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $emailAddress ?></span>
        </div>
        <ul class="py-2 z-50" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block px-4 py-2 w-full text-sm text-start text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Be a Seller</button>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden bg-red-900 w-full md:flex md:w-auto md:order-1" id="navbar-user">
  <ul class="flex flex-col font-medium p-4 md:p-0 bg-red-900 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
    <li>
      <a href="./MainMenu.php" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
    </li>
    <li>
      <a href="./MainHome.php" class="block rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
    </li>
    <li>
      <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
    </li>
    <li>
      <a href="./MainCollection.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Collections</a>
    </li>
    <li>
      <a href="../pages/meet_the_team.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
    </li>
  </ul>
</div>

  </div>
</nav>
<br>
<br>
<br>

<nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="text-white text-lg font-bold">Your Logo</a>
            <!-- Search bar -->
            <div class="relative">
                <input type="text" placeholder="Search..." class="px-3 py-1 bg-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 search-bar">
                <button class="absolute right-0 top-0 mt-1 mr-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.5 17.5l2.5 2.5" />
                    </svg>
                </button>
            </div>
            <!-- Cart and wishlist -->
            <div class="flex mr-4 gap-4">
                <!-- Cart -->
                <div class="cart-wishlist mr-4 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20c1.333 0 2.666-.666 3.333-1m-6.333-4h14l-2.5-7h-9l-2-6h-6l-2 6h-1.5" /> </svg>
                <span class="count">0</span>
            </div>
            <!-- Wishlist -->
            <div class="cart-wishlist relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.7 8.7l-8.1-8.1c-.6-.6-1.5-.6-2.1 0l-8.1 8.1c-.6.6-.6 1.5 0 2.1l8.1 8.1c.6.6 1.5.6 2.1 0l8.1-8.1c.6-.6.6-1.5 0-2.1z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-2-2m2 2l2-2m-7.8-3.2c-2.2-2.2-5.8-2.2-8 0-2.2 2.2-2.2 5.8 0 8l3.2 3.2c.6.6 1.5.6 2.1 0l3.2-3.2c2.2-2.2 2.2-5.8 0-8zM12 17c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z" />
                </svg>
                <span class="count">0</span>
            </div>
            </div>
        </div>
    </nav>

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
    <button type="button" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All categories</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Shoes</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Bags</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Electronics</button>
    <button type="button" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
    </div>
</div>

</body>
</html>