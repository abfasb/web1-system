<?php

include '../config/connection.php';
// Check if product_id is provided in the URL
if (isset($_GET['product_id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['product_id'];


    // Prepare a query to fetch product details based on product_id
    $query = "SELECT * FROM Products WHERE product_id = ?";

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while ($product = mysqli_fetch_assoc($result)) {
          $productAttributes = isset($product['attributes']) ? json_decode(trim($product['attributes']), true) : [];
          $productColors = isset($productAttributes['colors']) ? $productAttributes['colors'] : [];
          $productSizes = isset($productAttributes['sizes']) ? $productAttributes['sizes'] : [];
            $productImages = json_decode($product['images'], true);
            var_dump($productImages);
                 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
     .active-image {
        border: 2px solid black;
    }
    </style>
</head>
<body>
<?php include '../pages/homeSigned.php' ?>

<section class="py-12 sm:py-16"> 
  <div class="container mx-auto px-4">


    <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
      <div class="lg:col-span-3 lg:row-end-1">
        <div class="lg:flex lg:items-start">
          <div class="lg:order-2 lg:ml-5">
            <div class="max-w-xl overflow-hidden rounded-lg">
            <img id="largeImage" class="h-full w-full max-w-full object-cover" src="https://www.marthastewart.com/thmb/_n6b8N7i1enxW0vwrtztm-2GOfs=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/what-is-powdered-milk-getty-0823-d48aaff493c64523b78b8c521eee16ff.jpg" alt="" />  
          </div>
          </div>

          <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
          <div class="flex flex-row items-start lg:flex-col">
          <?php foreach ($productImages as $index => $image) : ?>
          <button type="button" onclick="toggleImage(this, '<?php echo $image; ?>')" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 <?php echo $index === 0 ? 'border-black' : ''; ?> text-center">
            <img class="h-full w-full object-cover" src="../pages/profile/uploads/<?php echo $image; ?>" alt="Error" />
          </button>
      <?php endforeach; ?>

</div>

          </div>
        </div>
      </div>

      <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
        <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl"><?php echo $product['product_name'] ?></h1>

        <div class="mt-5 flex items-center">
          <div class="flex items-center">
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" class=""></path>
            </svg>
          </div>
          <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
        </div>

        <h2 class="mt-8 text-base text-gray-900">Color</h2>
<div class="mt-3 flex select-none flex-wrap items-center gap-1">
    <?php if (!is_null($productColors)) : ?>
        <?php foreach ($productColors as $color) : ?>
            <label class="">
                <input type="radio" name="color" value="<?php echo $color; ?>" class="peer sr-only" />
                <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold"><?php echo $color; ?></p>
            </label>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<h2 class="mt-8 text-base text-gray-900">Size</h2>
<div class="mt-3 flex select-none flex-wrap items-center gap-1">
    <?php if (!is_null($productSizes)) : ?>
        <?php foreach ($productSizes as $size) : ?>
            <label class="">
                <input type="radio" name="size" value="<?php echo $size; ?>" class="peer sr-only" />
                <p class="peer-checked:bg-black peer-checked:text-white rounded-lg border border-black px-6 py-2 font-bold"><?php echo $size; ?></p>
            </label>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


        <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
          <div class="flex items-end">
            <h1 class="text-3xl font-bold">₱<?php echo $product['price'] ?></h1>
            <span class="text-base">/month</span>
          </div>

          <button type="button" onclick="addToCart(<?php echo $product['product_id']; ?>)" class="inline-flex items-center justify-center rounded-md border-2 border-transparent bg-gray-900 bg-none px-12 py-3 text-center text-base font-bold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            Add to cart
          </button>

          <button type="button" class="flex items-center p-4 border rounded-md px-8">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18l-1.422-1.307C4.01 13.26 1 10.127 1 6.5 1 4.015 3.015 2 5.5 2c1.477 0 2.844.86 3.5 2.208C9.156 2.86 10.523 2 12 2c2.485 0 4.5 2.015 4.5 4.5 0 3.627-3.01 6.76-7.578 10.193L10 18z" clip-rule="evenodd" />
    </svg>
    Wishlist
</button>

        </div>

        <ul class="mt-8 space-y-2">
          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
            </svg>
            Free shipping worldwide
          </li>

          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
            </svg>
            Cancel Anytime
          </li>
        </ul>
      </div>

      <div class="lg:col-span-3">
        <div class="border-b border-gray-300">
          <nav class="flex gap-4">
            <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

            <a href="#" title="" class="inline-flex items-center border-b-2 border-transparent py-4 text-sm font-medium text-gray-600">
              Reviews
              <span class="ml-2 block rounded-full bg-gray-500 px-2 py-px text-xs font-bold text-gray-100"> 1,209 </span>
            </a>
          </nav>
        </div>

        <div class="mt-8 flow-root sm:mt-12">
          <h1 class="text-3xl font-bold"><?php echo $product['description'] ?></h1>
          <p class="mt-4"><?php echo $product['description'] ?></p>
          <h1 class="mt-8 text-3xl font-bold">From the Fine Farms of Brazil</h1>
          <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio numquam enim facere.</p>
          <p class="mt-4">Amet consectetur adipisicing elit. Optio numquam enim facere. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore rerum nostrum eius facere, ad neque.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
        }
    } else {
        echo "<p>Product not found</p>";
    }

    mysqli_stmt_close($stmt);

    mysqli_close($connection);
} else {
    echo "<p>Product ID not provided</p>";
}
?>
<script>
  function toggleImage(button, image) {
    document.querySelectorAll('.flex-0').forEach(btn => {
        btn.classList.remove('border-black');
    });

    button.classList.add('border-black');

    document.querySelector('.max-w-xl img').src = '../pages/profile/uploads/' + image;
    }

    function addToCart(productId) {
      var colorsInput = document.querySelector('input[name="color"]:checked');
    var sizesInput = document.querySelector('input[name="size"]:checked');

    if (!colorsInput || !sizesInput) {
        alert('Please select a color and size');
        return;
    }

    var colors = colorsInput.value;
    var sizes = sizesInput.value;

    console.log('Product ID:', productId);
    console.log('Selected Color:', colors);
    console.log('Selected Size:', sizes);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/addToCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        console.log('Response:', xhr.responseText);
        if (xhr.status === 200 && xhr.responseText === 'success') {
            // Cart updated successfully
            alert('Product added to cart');
        } else {
            alert('Error adding product to cart');
        }
    };
    xhr.send('product_id=' + encodeURIComponent(productId) + '&colors=' + encodeURIComponent(colors) + '&sizes=' + encodeURIComponent(sizes));
}



</script>
</body>
</html>

