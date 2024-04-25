<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
    
</body>
</html>
