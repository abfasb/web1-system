<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webDb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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
  $colors = isset($_POST["colors"]) ? explode(",", $_POST["colors"]) : [];
$sizes = isset($_POST["sizes"]) ? explode(",", $_POST["sizes"]) : [];
$weights = isset($_POST["weights"]) ? explode(",", $_POST["weights"]) : [];

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
  $sql = "SELECT category_id FROM Categories WHERE category_name = '$categoryName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $categoryId = $row["category_id"];
  } else {
    $sql = "INSERT INTO Categories (category_name) VALUES ('$categoryName')";
    if ($conn->query($sql) === TRUE) {
      $categoryId = $conn->insert_id;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      exit();
    }
  }

  // Insert product into database
  $sql = "INSERT INTO Products (product_name, description, price, category_id, images, attributes) VALUES ('$productName', '$productDetails', $price, $categoryId, '" . json_encode($images) . "', '$attributes')";

  if ($conn->query($sql) === TRUE) {
    echo '<script> alert ("New record created successfully") </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="bg-white border rounded-lg shadow relative m-10">

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
        <div class="flex space-x-4 items-center justify-center gap-4 my-4">
<div class="col-span-full">
  <label for="colors" class="text-sm font-medium text-gray-900 block mb-2">Colors (Optional, separate multiple colors with commas)</label>
  <input type="text" name="colors" id="colors" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter colors">
</div>
<div class="col-span-full">
  <label for="sizes" class="text-sm font-medium text-gray-900 block mb-2">Sizes (Optional, separate multiple sizes with commas)</label>
  <input type="text" name="sizes" id="sizes" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter sizes">
</div>
<div class="col-span-full">
  <label for="weights" class="text-sm font-medium text-gray-900 block mb-2">Weights (Optional, separate multiple weights with commas)</label>
  <input type="text" name="weights" id="weights" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Enter weights">
</div>
</div>




        <div class="p-6 border-t border-gray-200 rounded-b">
        <button class="text-white bg-black w-1/2 mx-72 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>

        </div>
    </form>
</div>

</div>
</body>
</html>