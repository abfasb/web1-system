<?php

    session_start();$storeSession = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="../public/output.css">
</head>
<body>
    <?php include './utils/nav.php'?>
    <br>
    <br>
    <br>
    <?php include '../pages/payment.php'?>
    <br>
    
    <br>
    <div style = "display: flex; flex-wrap: wrap; justify-content: center; flex-direction: row; gap:1rem; z-index: 100;">
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    <?php include './utils/card.php'?>
    </div>
    <?php include'../pages/footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>