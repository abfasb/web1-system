<?php
    include '../config/connection.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST['Name'];
        $username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['Password'];

        if(empty($username) || empty($password) || empty($password)) {
            $_SESSION['error_message'] = 'Please enter both username and password.';
        } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
            $_SESSION['error_message'] = 'Password must contain at least one uppercase letter, one number, and be at least 8 character';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $queryUser = "INSERT INTO tblUser(Username, Password) VALUES (?, ?)";
            $statement = mysqli_prepare($connection, $queryUser);
            mysqli_stmt_bind_param($statement, "ss", $username, $hashedPassword);
            $queried = mysqli_stmt_execute($statement);

            if($queried) {
                $_SESSION['success_message'] = 'Registration Successful.';
                header("Location: /web1-system/pages/login.php");
                exit();
            }
            else {
                $_SESSION['error_message'] = 'Registration failed. Please try again.';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body class=" flex items-center justify-center bg-cover bg-center h-screen relative" style="background-image: url('../assets/img/hotel-bg.png');">
    <?php include'./home.php'?>
<div>
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full mt-14">
        <div class="flex justify-center">
            <span class="inline-block bg-gray-200 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
            </span>
        </div>
        <h2 class="text-2xl font-semibold text-center mb-4">Create a new account</h2>
        <p class="text-gray-600 text-center mb-6">Enter your details to register.</p>
        <?php
            if (isset($_SESSION['error_message'])) {
                echo '<div class="text-red-500 text-sm text-center mb-4">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
        ?>
        <form action = "/web1-system/pages/registration.php" method = "POST">
            <div class="mb-4">
                <label for="fullName" class="block text-gray-700 text-sm font-semibold mb-2">Full Name *</label>
                <input type="text" name = "Name" id="fullName" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="Matthew Balinton">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address *</label>
                <input type="email" name = "Username" id="email" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="matbalinton@gmail.com">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password *</label>
                <input type="password" name= "Password" id="password" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="••••••••">
                <p class="text-gray-600 text-xs mt-1">Must contain 1 uppercase letter, 1 number, min. 8 characters.</p>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Register</button>
            <p class="text-gray-600 text-xs text-center mt-4">
                By clicking Register, you agree to accept WebStay
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-blue-500 hover:underline">Terms and Conditions</button>.
            </p>
        </form>
    </div>
</div>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden overflow-scroll fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-10 space-y-4">
                <h1>Terms and Conditions of WebStay Harmony Suites</h1>
    <ol>
        <li>
            <strong>Acceptance of Terms:</strong> By accessing or using the WebStay Harmony Suites platform, you agree to be bound by these Terms and Conditions, our Privacy Policy, and any other guidelines or rules applicable to specific services offered by WebStay Harmony Suites.
        </li>
        <li>
            <strong>Reservation and Payment:</strong> When making a reservation through WebStay Harmony Suites, you agree to provide accurate and complete information. Payment for reservations is required in advance and is subject to the cancellation policy of the property.
        </li>
        <li>
            <strong>Cancellation and Refund:</strong> Cancellation policies vary by property and are outlined at the time of booking. Refunds, if applicable, will be processed according to the property's cancellation policy.
        </li>
        <li>
            <strong>Guest Conduct:</strong> Guests are expected to conduct themselves in a respectful manner towards staff and other guests. Any behavior deemed unacceptable by the property may result in immediate eviction without refund.
        </li>
        <li>
            <strong>Use of Facilities:</strong> Guests are responsible for any damages caused to the property or its facilities during their stay. Use of facilities such as swimming pools, gyms, and spas is at the guest's own risk.
        </li>
        <li>
            <strong>Privacy:</strong> WebStay Harmony Suites respects your privacy and will only use your personal information in accordance with our Privacy Policy. By using our platform, you consent to the collection and use of your information as outlined in the Privacy Policy.
        </li>
        <li>
            <strong>Limitation of Liability:</strong> WebStay Harmony Suites is not liable for any loss, damage, or injury incurred during your stay, unless caused by our negligence. Our liability is limited to the amount paid for the reservation.
        </li>
        <li>
            <strong>Governing Law:</strong> These Terms and Conditions are governed by the laws of the jurisdiction in which the property is located. Any disputes arising from these Terms and Conditions will be resolved in accordance with the laws of that jurisdiction.
        </li>
    </ol>
    <p>By using WebStay Harmony Suites, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use our platform.</p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>