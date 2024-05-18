<?php 

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
    <!-- Categories -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <ul class="grid grid-cols-5 gap-4">
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            bolt
                        </span>
                        Electronics
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            apparel
                        </span>
                        Clothing
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            auto_stories
                        </span>
                        Books
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            kitchen
                        </span>
                        Home & Kitchen
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            sports_soccer
                        </span>
                        Sports & Outdoors
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            health_and_safety
                        </span>
                        Health & Beauty
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            smart_toy
                        </span>
                        Toys & Games
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-14 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            manufacturing
                        </span>
                        Automotive
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-10 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            construction
                        </span>
                        Tools & Home Improvement
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center justify-center gap-2 text-lg text-gray-800 hover:text-blue-500 px-8 py-10 rounded-lg shadow-md">
                        <span class="material-symbols-outlined">
                            grocery
                        </span>
                        Grocery & Gourmet Food
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-800">New Arrivals</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8 px-4">
        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/400x300" alt="Product" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Product Name</h2>
                    <p class="mt-2 text-gray-600">Description of the product goes here. You can add some details about the product to entice customers.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="font-bold text-gray-800">$99.99</span>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add to Cart</button>
                    </div>
                </div>
            </div>
            <!-- Repeat the above product card for more products -->

        </div>
    </main>

</body>
</html>