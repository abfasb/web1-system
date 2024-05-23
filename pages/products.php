<?php
include '../config/connection.php';
include '../model/ProductModel.php';


$productModel = new ProductModel($connection);
$products = $productModel->getAllProducts();
$categories = $productModel->getSortedCategories();
$products = $productModel->getAllProductsWithRatings();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <style>
          .nav-link {
  color: white !important; /* Important to override any other conflicting styles */
}
.product-card {
        height: 400px; /* Set a fixed height for the product cards */
        display: flex;
        flex-direction: column;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .product-image {
        height: 243px;
        width: 382px;
    }

    .product-details {
        padding: 1rem;
        background-color: #f8fafc;
    }

    .product-name {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: auto;
    }
    </style>
</head>
<body class="">
<nav class="bg-black text-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
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
        <button onclick = "alert('You need to Sign In First')" class="group -m-2 flex items-center p-2">
          <svg class="h-6 w-6 flex-shrink-0 text-gray-100 group-hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>
          <span class="ml-2 text-sm font-medium text-white group-hover:text-blue-700">0</span>
        </button>
      </div>
    </div>
    <div class="items-center text-white p-4 justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="bg-black text-white flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">
        <li >
          <a href="../views/MainHome.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Home</a>
        </li>
        <li>
          <a href="../pages/meet_the_team.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active" aria-current="page">About</a>
        </li>
        <li>
          <a href="../pages/products.php" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">Products</a>
        </li>
        <li>
          <a href="../views/utils/slider.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>  
<div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
    <button type="button" class="category-button text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800" data-category-id="all">All categories</button>
    <?php foreach ($categories as $category): ?>
        <button type="button" class="category-button text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800" data-category-id="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></button>
    <?php endforeach; ?>
</div>

<div class="flex justify-center">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-12 m-14 products-container">
        <?php foreach ($products as $product): ?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 product-card" data-category-id="<?php echo $product['category_id'] ?>">
                <a href="../viewProduct.php?product_id=<?php echo $product['product_id']; ?>">
                    <?php
                    $images = json_decode($product['images'], true);
                    $product_image = './profile/uploads/' . $images[0]; // Assuming the first image is the main product image
                    ?>
                    <img class="p-8 rounded-t-lg product-image" src="<?php echo $product_image; ?>" alt="<?php echo $product['product_name']; ?>" />
                </a>
                <div class="px-5 pb-5 product-details">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white product-name"><?php echo $product['product_name']; ?></h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                          <?php
                      $rating = round($product['average_rating']); // Get the average rating
                      for ($i = 0; $i < 5; $i++) {
                          if ($rating >= 1) {
                              echo '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                          } else {
                              echo '<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
                          }
                          $rating--;
                      }
                      ?>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?php echo number_format($product['average_rating'], 1); ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white product-price">$<?php echo number_format($product['price'], 2); ?></span>
                        <button onclick = "alert('You need to Sign In First, thank you.')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

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