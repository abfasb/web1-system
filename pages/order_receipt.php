<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/output.css">
</head>
<body>

<?php include './homeSigned.php' ?>


<div class="container mx-auto p-8 mt-10">
    <h1 class="text-4xl font-bold mb-8">Order History</h1>
    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex">
                <a href="#" class="w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 text-indigo-600 text-lg">
                    Total Orders
                    <span class="ml-2 text-sm text-gray-500">10</span>
                </a>
                <a href="#" class="w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                    Active Orders
                    <span class="ml-2 text-sm text-gray-500">5</span>
                </a>
                <a href="#" class="w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                    Completed
                    <span class="ml-2 text-sm text-gray-500">15</span>
                </a>
                <a href="#" class="w-1/4 py-4 px-6 flex items-center justify-center border-b-2 font-medium border-gray-200 hover:text-indigo-600 text-lg">
                    Cancelled
                    <span class="ml-2 text-sm text-gray-500">8</span>
                </a>
            </nav>
        </div>
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl font-medium leading-6 text-gray-900">Recent Orders</h3>
        </div>
        <div class="border-t border-gray-200">
            <ul class="divide-y divide-gray-200">
                <li>
                    <a href="#" class="block hover:bg-gray-50">
                        <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                            <div class="flex items-center">
                                <img src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?cs=srgb&dl=pexels-madebymath-90946.jpg&fm=jpg" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                <div class="ml-4 flex flex-col">
                                    <span class="text-xl font-bold text-gray-900">$100.00</span>
                                    <span class="text-base text-green-600">Delivered</span>
                                </div>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="text-lg font-medium text-indigo-600">#12345</span>
                                <span class="text-lg text-gray-500">2024-05-11</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="block hover:bg-gray-50">
                        <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                            <div class="flex items-center">
                                <img src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?cs=srgb&dl=pexels-madebymath-90946.jpg&fm=jpg" alt="Order Image" class="h-20 w-20 object-cover rounded-md">
                                <div class="ml-4 flex flex-col">
                                    <span class="text-xl font-bold text-gray-900">$50.00</span>
                                    <span class="text-base text-yellow-600">Processing</span>
                                </div>
                            </div>
                            <div class="flex flex-col text-right">
                                <span class="text-lg font-medium text-indigo-600">#12344</span>
                                <span class="text-lg text-gray-500">2024-05-10</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- More list items for other orders -->
            </ul>
        </div>
    </div>
</div>



</body>
</html>