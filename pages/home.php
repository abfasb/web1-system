<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/output.css">
    <style>
        .blue-link {
            color: blue !important;
        }
        
    </style>
    <script src="../scripts/nav.js"></script>
</head>
<body>
    
<nav class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
    <a href="../views/MainHome.php" class="flex items-center justify-cente space-x-3 rtl:space-x-reverse">
      <img src="../assets/img/logoooo.png" class=" w-16 object-cover mt-1" alt="ShopSphere Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ShopSphere</span>
    </a>
    <div class="flex gap-4 hover:border-blue-700 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button id="get-started-btn" type="button" class="text-white z-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
      <button id="sign-up-btn" type="button" class="text-white z-10 border-blue-700 rounded-md p-3 gap-1">Sign In</button>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
      <div class="flow-roo flex items-center h-full justify-center pt-3 ml-4">
        <a href="#" class="group -m-2 flex items-center p-2">
          <svg class="h-6 w-6 flex-shrink-0 text-gray-100 group-hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>
          <span class="ml-2 text-sm font-medium text-white group-hover:text-blue-700">0</span>
        </a>
      </div>
    </div>
    <div class="items-center p-4 justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class=" flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li >
          <a href="../views/MainHome.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Home</a>
        </li>
        <li>
          <a href="../pages/meet_the_team.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active" aria-current="page">About</a>
        </li>
        <li>
          <a href="../pages/products.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Products</a>
        </li>
        <li>
          <a href="../pages/cart.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
