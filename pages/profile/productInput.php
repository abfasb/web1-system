<?php

include '../../config/connection.php';

session_start();
// Create uploads directory if it doesn't exist
$target_dir = "uploads/";
if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST["product-name"];
  $categoryName = $_POST["category"];
  $brand = $_POST["brand"];
  $price = $_POST["price"];
  $productDetails = $_POST["product-details"];
  $images = [];
  $colors = isset($_POST["colors"]) ? explode(", ", $_POST["colors"]) : [];
  $sizes = isset($_POST["sizes"]) ? explode(", ", $_POST["sizes"]) : [];
  $weights = isset($_POST["weights"]) ? explode(", WW", $_POST["weights"]) : [];

  $attributes = json_encode(["colors" => $colors, "sizes" => $sizes, "weights" => $weights]);

  // Handle multiple file uploads
  foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
    $file_name = $_FILES["images"]["name"][$key];
    $file_tmp = $_FILES["images"]["tmp_name"][$key];
    $target_file = $target_dir . basename($file_name);

    // Move uploaded file to uploads directory
    if (move_uploaded_file($file_tmp, $target_file)) {
      $images[] = $file_name;
    } else {
      echo "Failed to upload file: $file_name";
    }
  }

  // Check if category exists
  $stmt = $connection->prepare("SELECT category_id FROM Categories WHERE category_name = :categoryName");
  $stmt->bindParam(':categoryName', $categoryName);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($stmt->rowCount() > 0) {
    $categoryId = $row["category_id"];
  } else {
    $stmt = $connection->prepare("INSERT INTO Categories (category_name) VALUES (:categoryName)");
    $stmt->bindParam(':categoryName', $categoryName);
    $stmt->execute();
    $categoryId = $connection->lastInsertId();
  }

  // Insert product into database
  $userId = $_SESSION['userId']; // Assuming the seller's user ID is stored in the session
  $stmt = $connection->prepare("INSERT INTO Products (product_name, description, price, category_id, images, attributes, user_id) VALUES (:productName, :productDetails, :price, :categoryId, :images, :attributes, :userId)");
  $stmt->bindParam(':productName', $productName);
  $stmt->bindParam(':productDetails', $productDetails);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':categoryId', $categoryId);
  $stmt->bindParam(':images', json_encode($images));
  $stmt->bindParam(':attributes', $attributes);
  $stmt->bindParam(':userId', $userId);
  
  if ($stmt->execute()) {
    echo '<script> alert ("New record created successfully") </script>';
  } else {
    echo "Error: " . $stmt->errorInfo();
  }
}

$conn = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
       .image-preview {
        position: relative;
        width: 150px;
        height: 150px;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
    }
    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    .remove-button {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    </style>
</head>
<body>


<a href="#" onclick="history.go(-1);" class="absolute top-0 left-0 flex flex-row p-5 text-gray-500 font-bold hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
Go Back
        
    </a>
    
<div class="bg-white border rounded-lg shadow relative m-12 ">


<div class="flex items-start justify-between p-5 border-b rounded-t">
    <h3 class="text-xl font-semibold">
        Add Product
    </h3>
</div>

<div class="p-6 space-y-6">
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Product Name</label>
                <input type="text" name="product-name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Category</label>
                <select name="category" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required="">
                    <option value="" disabled selected>Select a category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Books">Books</option>
                    <option value="Home & Kitchen">Home & Kitchen</option>
                    <option value="Sports & Outdoors">Sports & Outdoors</option>
                    <option value="Health & Beauty">Health & Beauty</option>
                    <option value="Toys & Games">Toys & Games</option>
                    <option value="Automotive">Automotive</option>
                    <option value="Tools & Home Improvement">Tools & Home Improvement</option>
                    <option value="Grocery & Gourmet Food">Grocery & Gourmet Food</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Brand</label>
                <input type="text" name="brand" id="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple" required="">
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="$2300" required="">
            </div>
            <div class="col-span-full">
                <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Product Details</label>
                <textarea id="product-details" name="product-details" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Details"></textarea>
            </div>
            <div class="col-span-full">
                    <label for="images" class="text-sm font-medium text-gray-900 block mb-2">Images</label>
                    <input type="file" name="images[]" id="images" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" multiple required="">
                </div>
            </div>
            
            <div class="col-span-full mt-4">
                <div id="image-container" class="flex flex-wrap gap-4"></div>
            </div>
        </div>
        <div class="flex space-x-4 items-center justify-center gap-4 my-4">
<div class="col-span-full">
  <label for="colors" class="text-sm font-medium text-gray-900 block mb-2">Colors (Attributes, separate multiple colors with commas)</label>
  <input type="text" name="colors" id="colors" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter colors">
</div>
<div class="col-span-full">
  <label for="sizes" class="text-sm font-medium text-gray-900 block mb-2">Sizes (Attributes, separate multiple sizes with commas)</label>
  <input type="text" name="sizes" id="sizes" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter sizes">
</div>
</div>




        <div class="p-6 border-t border-gray-200 rounded-b">
        <button class="text-white bg-black w-1/2 mx-72 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>

        </div>
    </form>
</div>

</div>
<script>
 document.getElementById('images').addEventListener('change', function(event) {
    const files = Array.from(event.target.files);
    const imageContainer = document.getElementById('image-container');
    imageContainer.innerHTML = '';

    files.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.classList.add('image-preview');
            div.innerHTML = `
                <img src="${e.target.result}" alt="Image">
                <button class="remove-button" data-index="${index}">&times;</button>
            `;
            div.querySelector('.remove-button').addEventListener('click', function() {
                removeImage(index);
            });
            imageContainer.appendChild(div);
        }
        reader.readAsDataURL(file);
    });

    window.uploadedFiles = files;
});

function removeImage(index) {
    window.uploadedFiles.splice(index, 1);
    
    const dataTransfer = new DataTransfer();
    window.uploadedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });
    document.getElementById('images').files = dataTransfer.files;

    const imageContainer = document.getElementById('image-container');
    imageContainer.innerHTML = '';
    window.uploadedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.classList.add('image-preview');
            div.innerHTML = `
                <img src="${e.target.result}" alt="Image">
                <button class="remove-button" data-index="${index}">&times;</button>
            `;
            div.querySelector('.remove-button').addEventListener('click', function() {
                removeImage(index);
            });
            imageContainer.appendChild(div);
        }
        reader.readAsDataURL(file);
    });
}

</script>
</body>
</html>