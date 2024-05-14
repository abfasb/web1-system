<?php
session_start();


$userInitial = strtoupper(substr($_SESSION['Username'], 0, 1));
$userName =  $_SESSION['Username'];
$emailAddress = $_SESSION['Email'];

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
        .btn-align-start {
  text-align: left;
}

        .nav-link {
            color: white !important; 
        }
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
<br>
<nav class="bg-black text-black border-gray-200 dark:bg-gray-900" style = "position: fixed; top: 0; width: 100%;">
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
      <div class="hidden my-4 text-base list-none text-black bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 z-50" id="user-dropdown">
        <div class="px-4 py-3 z-50">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $userName ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $emailAddress ?></span>
        </div>
        <ul class="py-2 z-50" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
          <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block px-4 items-start py-2 w-full text-sm text-start text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white btn-align-start">Be a Seller</button>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
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
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
    <ul class=" bg-black flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-black dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 nav-link">
      <li>
        <a href="./MainMenu.php" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
      </li>
      <li>
        <a href="./MainHome.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
      </li>
      <li>
        <a href="./MainCollection.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Collections</a>
      </li>
      <li>
        <a href="../pages/meet_the_team.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<br>
<br>
 <?php include './utils/realProduct.php' ?>

</body>
</html>