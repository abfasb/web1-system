<?php
// Database connection
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST["product-name"];
  $category = $_POST["category"];
  $brand = $_POST["brand"];
  $price = $_POST["price"];
  $productDetails = $_POST["product-details"];

  // Insert product into database
  $sql = "INSERT INTO Products (product_name, description, price, category_id, images) VALUES ('$productName', '$productDetails', $price, (SELECT category_id FROM Categories WHERE category_name = '$category'), '[]')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
    <form method="post" action="#">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Product Name</label>
                <input type="text" name="product-name" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Apple Imac 27”" required="">
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Category</label>
                <input type="text" name="category" id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Electronics" required="">
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
        </div>
        <div class="p-6 border-t border-gray-200 rounded-b">
            <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
        </div>
    </form>
</div>

</div>
</body>
</html>
