<?php

include '../config/connection.php';

$products = $productModel->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
  <body class=" text-white bg-gray-900">
  
    <main class="flex flex-col md:flex-row container mx-auto max-w-6xl">
      <div class="space-y-4 p-2 w-full md:max-w-[10rem] pr-7">
        <h2 class="text-2xl">Filters</h2>
        <h3 class="text-xl mb-2">Category</h3>
        <div id="filters-container" class="text-xl space-y-2">
          <div>
            <input type="checkbox" class="check" id="cameras" />
            <label for="cameras">Cameras</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="smartphones" />
            <label for="smartphones">Smartphones</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="games" />
            <label for="games">Games</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="televisions" />
            <label for="televisions">Televisions</label>
          </div>
        </div>
      </div>

      <!-- Products wrapper -->
      <div id="products-wrapper" class="grid ml-2 m-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <?php foreach ($products as $product): ?>
        <div class="bg-white w-[232px] h-[232,  230] rounded-lg overflow-hidden shadow-md">
            <?php
            $images = json_decode($product['images'], true);
            $product_image = '../pages/profile/uploads/' . $images[0]; // Assuming the first image is the main product image
            ?>
            <img class="object-cover object-center w-[232px] h-[138px] p-2 rounded-lg" src="<?php echo $product_image; ?>" alt="<?php echo $product['product_name']; ?>" style="width: 232px; height: 138px;">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900"><?php echo $product['product_name']; ?></h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-gray-900 font-bold">$<?php echo number_format($product['price'], 2); ?></span>
                    <a href = "./viewProduct.php?product_id=<?php echo $product['product_id']; ?>" class="px- py-1 bg-blue-500 text-white text-xs font-semibold rounded focus:outline-none focus:bg-blue-600 p-4" onclick = "addToCart(<?php echo $product['product_id']?>)">Add to Cart</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



    </main>


</body>
</html>


<script>
  function addToCart(product_id) {
    window.location.href = "./viewProduct.php?product_id=<?php echo $product['product_id']; ?>";
  }

    </script>