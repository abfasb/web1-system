<?php
include '../config/connection.php';
session_start();

$userInitial = strtoupper(substr($_SESSION['Username'], 0, 1));
$userName = $_SESSION['Username'];
$emailAddress = $_SESSION['Email'];
$userid = $_SESSION['userId'];

if (!isset($userName)) {
    header("Location: ../pages/login.php");
    exit(); // Add exit here to prevent further execution
}

$cartQuery = "SELECT COUNT(*) AS cart_count FROM Cart WHERE user_id = ?";
$wishlistQuery = "SELECT COUNT(*) AS wishlist_count FROM Wishlist WHERE user_id = ?";

$cartCount = 0;
$wishlistCount = 0;

$stmt = $connection->prepare($cartQuery);
$stmt->bindParam(1, $userid, PDO::PARAM_INT);
$stmt->execute();
$cartResult = $stmt->fetch(PDO::FETCH_ASSOC);
$cartCount = $cartResult['cart_count'];

$stmt = $connection->prepare($wishlistQuery);
$stmt->bindParam(1, $userid, PDO::PARAM_INT);
$stmt->execute();
$wishlistResult = $stmt->fetch(PDO::FETCH_ASSOC);
$wishlistCount = $wishlistResult['wishlist_count'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./utils/MainMenuFooter/style.css">
</head>
<body>
    <?php  include 'navTry.php'?>
    <br>
    <br>
    <br>
    <br>
    <?php include '../pages/payment.php'?>
    <br>
    <?php include './productFilter.php' ?>

    <br>
    <div style = "display: flex; flex-wrap: wrap; justify-content: center; flex-direction: row; gap:1rem; z-index: 100;">
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    </div>
    <section class="home">
      <div class="description">
        <h1 class="title">
          <span class="gradient-text">Grow Professionally</span> with the Best
        </h1>
        <p class="paragraph">
          In a world filled with opportunities, having a mentor can make all the
          difference. Explore why people turn to this invaluable resource to
          unlock their potential.
        </p>
        <form id="form" autocomplete="off">
          <input
            type="email"
            id="email-id"
            name="email_address"
            aria-label="email adress"
            placeholder=""
            required
            oninput="checkEmpty()" />
          <button type="submit" class="btn" aria-label="submit">
            <span>Subscribe</span>
            <ion-icon name="arrow-forward-outline"></ion-icon>
          </button>
        </form>
      </div>

      <div class="users-color-container">
        <span class="item" style="--i: 1"></span>
        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/274f29ce-0d3f-4ac2-a2aa-f9b7bd188b2a"
          style="--i: 2"
          alt="" />
        <span class="item" style="--i: 3"></span>
        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/b8a14493-3d9f-4b9b-b93a-56d0bc7243e9"
          style="--i: 4"
          alt="" />

        <img
          class="item"
          src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/03e51e1e-9750-45a5-b75e-a1e341d4562a"
          style="--i: 10"
          alt="" />
        <span class="item" style="--i: 11"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/5eb50f89-3e5a-480e-860c-8d40d3ba9ffe" style="--i: 12" alt="" />
        <span class="item" style="--i: 5"></span>

        <span class="item" style="--i: 9"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/86c71a79-2efe-4567-8665-b1e5a1fd9735" style="--i: 8" alt="" />
        <span class="item" style="--i: 7"></span>
        <img class="item" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/97ef9643-5202-41aa-80f0-ceeabccdd099" style="--i: 6" alt="" />
      </div>
    </section>
    <div class = "h-full w-full mt-4 bg-white">
    <?php include'../pages/footer.php'?>
    </div>
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden overflow-scroll fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full text-black">
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
                <h1>Terms and Conditions of Digital Marketplace: Explore and Shop Online System</h1>
    <ol>
        <li>
            <strong>Acceptance of Terms:</strong> By accessing or using the Digital Marketplace: Explore and Shop Online System platform, you agree to be bound by these Terms and Conditions, our Privacy Policy, and any other guidelines or rules applicable to specific services offered by Digital Marketplace: Explore and Shop Online System.
        </li>
        <li>
            <strong>Reservation and Payment:</strong> When making a reservation through Digital Marketplace: Explore and Shop Online System, you agree to provide accurate and complete information. Payment for reservations is required in advance and is subject to the cancellation policy of the seller.
        </li>
        <li>
            <strong>Cancellation and Refund:</strong> Cancellation policies vary by seller and are outlined at the time of booking. Refunds, if applicable, will be processed according to the seller's cancellation policy.
        </li>
        <li>
            <strong>Customer Conduct:</strong> Customers are expected to conduct themselves in a respectful manner towards sellers and other customers. Any behavior deemed unacceptable by the seller may result in account suspension or termination.
        </li>
        <li>
            <strong>Use of Services:</strong> Customers are responsible for any damages caused to the seller's products or services during their use. Use of services is at the customer's own risk.
        </li>
        <li>
            <strong>Privacy:</strong> Digital Marketplace: Explore and Shop Online System respects your privacy and will only use your personal information in accordance with our Privacy Policy. By using our platform, you consent to the collection and use of your information as outlined in the Privacy Policy.
        </li>
        <li>
            <strong>Limitation of Liability:</strong> Digital Marketplace: Explore and Shop Online System is not liable for any loss, damage, or injury incurred during your use of the platform, unless caused by our negligence. Our liability is limited to the amount paid for the transaction.
        </li>
        <li>
            <strong>Governing Law:</strong> These Terms and Conditions are governed by the laws of the jurisdiction in which Digital Marketplace: Explore and Shop Online System operates. Any disputes arising from these Terms and Conditions will be resolved in accordance with the laws of that jurisdiction.
        </li>
    </ol>
    <p>By using Digital Marketplace: Explore and Shop Online System, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use our platform.</p>
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
               <button onclick="acceptTerms()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
              </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  function acceptTerms() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            alert("Terms accepted successfully!");
            window.location.href = "./AdminPanel.php"
        }
    };
    xhr.open("POST", "../controllers/updateUserToSeller.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();
}

</script>
</body>
</html>