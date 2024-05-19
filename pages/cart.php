<?php
include '../config/connection.php';
session_start();

$userInitial = strtoupper(substr($_SESSION['Username'], 0, 1));
$userName = $_SESSION['Username'];
$emailAddress = $_SESSION['Email'];

if (!isset($_SESSION['Username'], $_SESSION['Email'], $_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$provinces = [
    "Abra", "Agusan del Norte", "Agusan del Sur", "Aklan", "Albay", "Antique", "Apayao", "Aurora", "Basilan", "Bataan",
    "Batanes", "Batangas", "Benguet", "Biliran", "Bohol", "Bukidnon", "Bulacan", "Cagayan", "Camarines Norte", "Camarines Sur",
    "Camiguin", "Capiz", "Catanduanes", "Cavite", "Cebu", "Cotabato", "Davao de Oro", "Davao del Norte", "Davao del Sur",
    "Davao Occidental", "Davao Oriental", "Dinagat Islands", "Eastern Samar", "Guimaras", "Ifugao", "Ilocos Norte", "Ilocos Sur",
    "Iloilo", "Isabela", "Kalinga", "La Union", "Laguna", "Lanao del Norte", "Lanao del Sur", "Leyte", "Maguindanao del Norte",
    "Maguindanao del Sur", "Marinduque", "Masbate", "Metro Manila", "Misamis Occidental", "Misamis Oriental", "Mountain Province",
    "Negros Occidental", "Negros Oriental", "Northern Samar", "Nueva Ecija", "Nueva Vizcaya", "Occidental Mindoro", "Oriental Mindoro",
    "Palawan", "Pampanga", "Pangasinan", "Quezon", "Quirino", "Rizal", "Romblon", "Samar", "Sarangani", "Siquijor", "Sorsogon",
    "South Cotabato", "Southern Leyte", "Sultan Kudarat", "Sulu", "Surigao del Norte", "Surigao del Sur", "Tarlac", "Tawi-Tawi",
    "Zambales", "Zamboanga del Norte", "Zamboanga del Sur", "Zamboanga Sibugay"
];

// Generate the select dropdown options
$options = "";
foreach ($provinces as $province) {
    $options .= "<option value=\"$province\">$province</option>";
}

$user_id = $_SESSION['user_id'];
$query = "SELECT p.product_id, p.product_name, p.price, c.quantity, p.images, c.attributes FROM Cart c
          INNER JOIN Products p ON c.product_id = p.product_id
          WHERE c.user_id = ?";
$stmt = $connection->prepare($query);
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$shipping = 8.00;
$total = $subtotal + $shipping;

$cartQuery = "SELECT COUNT(*) AS cart_count FROM Cart WHERE user_id = $user_id";
$wishlistQuery = "SELECT COUNT(*) AS wishlist_count FROM Wishlist WHERE user_id = $user_id";

$cartCount = 0;
$wishlistCount = 0;

// Execute the queries
$stmt = $connection->query($cartQuery);
if ($stmt) {
    $cartCount = $stmt->fetch(PDO::FETCH_ASSOC)['cart_count'];
}

$stmt = $connection->query($wishlistQuery);
if ($stmt) {
    $wishlistCount = $stmt->fetch(PDO::FETCH_ASSOC)['wishlist_count'];
}

// Assuming $paymentMethod is determined earlier in your code
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    if (isset($_POST['cash-on-delivery'])) {
        $paymentMethod = "cash_on_delivery";
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $shippingMethod = isset($_POST['shipping_method']) ? $_POST['shipping_method'] : '';

        $orderSql = "INSERT INTO Orders (user_id, order_date, total_amount, payment_method, address, shipping_method) 
                      VALUES (?, NOW(), ?, ?, ?, ?)";
        $stmt = $connection->prepare($orderSql);
        $stmt->execute([$user_id, $total, $paymentMethod, $address, $shippingMethod]);
        $orderId = $connection->lastInsertId();

        foreach ($cart_items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];
            $unitPrice = $item['price'];

            $orderItemSql = "INSERT INTO Order_Items (order_id, product_id, quantity, unit_price) 
                              VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($orderItemSql);
            $stmt->execute([$orderId, $productId, $quantity, $unitPrice]);
        }

        echo '<script>
                alert("Your order was successfully processed with Cash On Delivery.");
                setTimeout(function() {
                    window.location.href = "receipt.php?order_id=' . $orderId . '";
                }, 1000);
            </script>';
    } else {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $cardHolder = isset($_POST['card-holder']) ? $_POST['card-holder'] : '';
        $cardNumber = isset($_POST['card-number']) ? $_POST['card-number'] : '';
        $expiryDate = isset($_POST['credit-expiry']) ? $_POST['credit-expiry'] : '';
        $cvc = isset($_POST['credit-cvc']) ? $_POST['credit-cvc'] : '';
        $billingAddress = isset($_POST['billing-address']) ? $_POST['billing-address'] : '';
        $billingState = isset($_POST['billing-state']) ? $_POST['billing-state'] : '';
        $billingZip = isset($_POST['billing-zip']) ? $_POST['billing-zip'] : '';
        $paymentMethod = "credit_card";
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $shippingMethod = isset($_POST['shipping_method']) ? $_POST['shipping_method'] : '';

        $paymentSql = "INSERT INTO Payment_Details (email, card_holder, card_number, expiry_date, cvc, billing_address, billing_state, billing_zip) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($paymentSql);
        $stmt->execute([$email, $cardHolder, $cardNumber, $expiryDate, $cvc, $billingAddress, $billingState, $billingZip]);
        $paymentId = $connection->lastInsertId();

        $orderSql = "INSERT INTO Orders (user_id, order_date, total_amount, payment_method, payment_id, address, shipping_method)
        VALUES (?, NOW(), ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($orderSql);
        $stmt->execute([$user_id, $total, $paymentMethod, $paymentId, $address, $shippingMethod]);
        $orderId = $connection->lastInsertId();
        foreach ($cart_items as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];
            $unitPrice = $item['price'];
    
            $orderItemSql = "INSERT INTO Order_Items (order_id, product_id, quantity, unit_price) 
                              VALUES (?, ?, ?, ?)";
            $stmt = $connection->prepare($orderItemSql);
            $stmt->execute([$orderId, $productId, $quantity, $unitPrice]);
        }
    
        echo '<script>alert("Your order was successfully processed with Credit Card payment.");</script>';
        header("Location: receipt.php?order_id=$orderId");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-black text-black border-gray-200 dark:bg-gray-900" style = "position: fixed; z-index: 50; top: 0; width: 100%;">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="./MainHome.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../assets/img/logoooo.png" class="h-8" alt="ShopSphere Logo" />
      <span class="self-center text-white text-2xl font-semibold whitespace-nowrap dark:text-white">ShopSphere</span>
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
  <ul class="ml-4 xl:w-48 absolute right-0 ">
                <li class="ml-2 lg:ml-4 relative inline-block">
                    <a class="" href="../pages/wishlist.php">
                        <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-xs font-bold px-1 py-0.5 rounded-sm"><?php echo $wishlistCount ?></div>
                        <svg class="h-9 lg:h-10 p-2 text-white" aria-hidden="true" focusable="false" data-prefix="far" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-heart fa-w-16 fa-9x">
                            <path fill="currentColor" d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"></path>
                        </svg>
                    </a>
                </li>
                <li class="ml-2 lg:ml-4 relative inline-block">
                    <a class="" href="../pages/cart.php">
                        <div class="absolute -top-1 right-0 z-10 bg-yellow-400 text-blue-700 text-xs font-bold px-1 py-0.5 rounded-sm"><?php echo $cartCount ?></div>
                        <svg class="h-9 lg:h-10 p-2 text-blue-700" aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-9x">
                            <path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z"></path>
                        </svg>
                    </a>
                </li>
            </ul>
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
        <a href="../views/MainMenu.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
      </li>
      <li>
        <a href="../views/MainHome.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Shop</a>
      </li>
      <li>
        <a href="../views/utils/realProduct.php" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Collections</a>
      </li>
      <li>
        <a href="../../pages/meet_the_team.php" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div class="grid mt-[90px] sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <!-- Left Column -->
    <div class="px-4 pt-8">
        <p class="text-xl font-medium">Order Summary</p>
        <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
        <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
            <!-- Existing code for cart items -->
            <?php foreach ($cart_items as $row) { ?>
                <?php
                   $productAttributes = isset($row['attributes']) ? json_decode(trim($row['attributes']), true) : [];
                   $productColors = isset($productAttributes['colors']) ? $productAttributes['colors'] : [];
                   $productSizes = isset($productAttributes['sizes']) ? $productAttributes['sizes'] : [];
                   $productImages = json_decode($row['images'], true);
                ?>
                <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                    <img class="m-2 h-[96px] w-[140px] rounded-md border object-cover object-center" src="../pages/profile/uploads/<?php echo $productImages[0]; ?>" alt="Error" />
                    <div class="flex w-full flex-col px-4 py-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-semibold"><?php echo $row['product_name']; ?></span>
                            <button class="text-red-500 remove-btn" data-product-id="<?php echo $row['product_id']; ?>">Remove</button>
                        </div>
                        <span class="float-right text-gray-400"><?php echo $productSizes . " - " . $productColors ?></span>
                        <div class="flex items-center mt-auto">
                            <input type="number" min="1" max="10" class="w-20 px-2 py-1 border rounded-md mr-2" value="<?php echo $row['quantity']; ?>">
                            <p class="text-lg font-bold">$<?php echo $row['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <!-- Right Column -->
    <div class="px-4 pt-8">
        <p class="mt-8 text-lg font-medium">Shipping Methods</p>
        <form class="mt-5 grid gap-6" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="relative">
                <input class="peer hidden" type="radio" id="shipping_jt" name="shipping_method" value="J&T Express" checked />
                <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="shipping_jt">
                    <img class="w-14 object-contain" src="https://www.vhv.rs/dpng/d/502-5026733_vector-logo-j-t-png-j-t-express.png" alt="Logo" />
                    <div class="ml-5">
                        <span class="mt-2 font-semibold">J&T Express</span>
                        <p class="text-slate-500 text-sm leading-6">Delivery: 2-4 Days</p>
                    </div>
                </label>
            </div>
            <div class="relative">
                <input class="peer hidden" type="radio" id="shipping_ninja" name="shipping_method" value="Ninja Van" />
                <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="shipping_ninja">
                    <img class="w-14 object-contain" src="https://seeklogo.com/images/N/ninja-van-logo-DE7BA0B07C-seeklogo.com.png" alt="Logo 2" />
                    <div class="ml-5">
                        <span class="mt-2 font-semibold">Ninja Van</span>
                        <p class="text-slate-500 text-sm leading-6">Delivery: 3-5 Days</p>
                    </div>
                </label>
            </div>
            <p class="text-lg font-medium">Delivery Address (Cash On Delivery)</p>
            <div class="relative">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-1 block w-full rounded-lg border-gray-300 p-4 shadow-sm focus:border-gray-700 focus:ring focus:ring-gray-700 focus:ring-opacity-50" placeholder="Street address, P.O. box, etc.">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-1/2 right-4 transform -translate-y-1/2 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 3l4-4l5 5v6H3v-10zM3 10V7a3 3 0 013-3h3m-6 6h4" />
                </svg>
            </div>
            <p class="text-xl font-medium mt-2">Payment Details</p>
            <p class="text-gray-400">Complete your order by providing your payment details.</p>
            <label for="email" class="block text-sm font-medium">Email</label>
            <div class="relative">
                <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
            </div>
            <label for="card-holder" class="block text-sm font-medium">Card Holder</label>
            <div class="relative">
                <input type="text" id="card-holder" name="card-holder" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.17-.79L3.6 16.071a1.125 1.125 0 01-.9 1.929h14.664a1.125 1.125 0 01-.9-1.929l-2.37-1.36z" />
                    </svg>
                </div>
            </div>
            <label for="card-no" class="block text-sm font-medium">Card Details</label>
            <div class="flex">
                <div class="relative w-7/12 flex-shrink-0">
                    <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16M4 15h16M10 9v6" />
                        </svg>
                    </div>
                </div>
                <input type="text" name="credit-expiry" class="w-1/3 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
                <input type="text" name="credit-cvc" class="w-1/3 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
            </div>
            <label for="billing-address" class="block text-sm font-medium">Billing Address</label>
            <div class="flex flex-col sm:flex-row">
                <div class="relative flex-shrink-0 sm:w-7/12">
                    <input type="text" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <img class="h-4 w-4 object-contain" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_the_Philippines.svg/1280px-Flag_of_the_Philippines.svg.png" alt="Flag" />
                    </div>
                </div>
                <select type="text" name="billing-state" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    <option value="State">State</option>
                    <?php echo $options ?>
                </select>
                <input type="text" name="billing-zip" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
            </div>
            <div class="flex items-center mb-3">
              <hr class="h-0 border-b border-solid border-grey-500 grow">
              <p class="mx-4 text-grey-600">or</p>
              <hr class="h-0 border-b border-solid border-grey-500 grow">
            </div>
            <div class="relative">
                <input type="checkbox" id="cash-on-delivery" name="cash-on-delivery" class="peer hidden" />
                <span class="peer-checked:border-red-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                <label for="cash-on-delivery" class="peer-checked:border-2 peer-checked:border-red-700 peer-checked:bg-red-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0-2c2.2 0 4 1.8 4 4s-1.8 4-4 4-4-1.8-4-4 1.8-4 4-4zm0 10c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM4 12c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8-8-3.59-8-8z"/>
                    </svg>
                    <div class="ml-5">
                        <span class="mt-2 font-semibold">Cash on Delivery</span>
                        <p class="text-gray-500 text-sm leading-6">Pay with cash upon delivery</p>
                    </div>
                </label>
            </div>
            <div class="border-t border-b py-2" id="cart-details">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Subtotal</p>
                    <p id="subtotal" class="font-semibold text-gray-900">₱<?php echo number_format($subtotal, 2); ?></p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Shipping</p>
                    <p id="shipping" class="font-semibold text-gray-900">₱<?php echo number_format($shipping, 2); ?></p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p id="total" class="text-2xl font-semibold text-gray-900">₱<?php echo number_format($total, 2); ?></p>
                </div>
                <button name="place_order" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
            </div>
        </form>
    </div>
</div>





<div id="confirmation-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-1/4 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Remove Product</h3>
            <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to remove this product from your cart?</p>
            </div>
            <div class="mt-4">
                <button id="confirm-remove" class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-700">Remove</button>
                <button id="cancel-remove" class="px-4 py-2 mt-2 bg-gray-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-700">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-btn');
    const modal = document.getElementById('confirmation-modal');
    const confirmButton = document.getElementById('confirm-remove');
    const cancelButton = document.getElementById('cancel-remove');
    let productIdToRemove = null;

    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            productIdToRemove = this.getAttribute('data-product-id');
            modal.classList.remove('hidden');
        });
    });

    confirmButton.addEventListener('click', function() {
        if (productIdToRemove) {
            fetch(`../controllers/remove_from_cart.php?product_id=${productIdToRemove}&_=${new Date().getTime()}`, {
                  method: 'GET',
              })

            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    const productElement = document.getElementById(`product-${productIdToRemove}`);
                    if (productElement) {
                    alert('Deleted Successfully!');
                        productElement.remove();
                    }
                    modal.classList.add('hidden');
                    location.reload(); 
                } else {
                    alert('Failed to remove product from cart.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

    cancelButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});

document.addEventListener("DOMContentLoaded", function () {
        // Update subtotal, shipping, and total based on the values from PHP
        document.getElementById('subtotal').innerText = '₱<?php echo number_format($subtotal, 2); ?>';
        document.getElementById('shipping').innerText = '₱<?php echo number_format($shipping, 2); ?>';
        document.getElementById('total').innerText = '₱<?php echo number_format($total, 2); ?>';
    });

    

    function disableCreditCardFields() {
    document.getElementById("card-holder").disabled = true;
    document.getElementById("card-no").disabled = true;
    document.getElementsByName("credit-expiry")[0].disabled = true;
    document.getElementsByName("credit-cvc")[0].disabled = true;
    document.getElementById("billing-address").disabled = true;
    document.getElementsByName("billing-state")[0].disabled = true;
    document.getElementsByName("billing-zip")[0].disabled = true;
    
  }
  const emailInput = document.getElementById('email');

  function enableCreditCardFields() {
    document.getElementById("card-holder").disabled = false;
    document.getElementById("card-no").disabled = false;
    document.getElementsByName("credit-expiry")[0].disabled = false;
    document.getElementsByName("credit-cvc")[0].disabled = false;
    document.getElementById("billing-address").disabled = false;
    document.getElementsByName("billing-state")[0].disabled = false;
    document.getElementsByName("billing-zip")[0].disabled = false;
  }

  document.getElementById("cash-on-delivery").addEventListener("change", function() {
    if (this.checked) {
      disableCreditCardFields();
      emailInput.disabled = true;
    } else {
      enableCreditCardFields();
      emailInput.disabled = false;
    }
  });

  function initializeFormState() {
    var cashOnDeliveryCheckbox = document.getElementById("cash-on-delivery");
    if (cashOnDeliveryCheckbox.checked) {
      disableCreditCardFields();
    } else {
      enableCreditCardFields();
    }
  }

  window.onload = initializeFormState;
</script>

</body>
</html>