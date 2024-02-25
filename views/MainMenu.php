<?php

    session_start();$storeSession = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../pages/home.php'?>
    <br>
    <br>
    <br>
    <?php include '../pages/payment.php'?>
    <br>
    <br>
    <div style = "display: flex; flex-wrap: wrap; justify-content: center; flex-direction: row; gap:1rem;">
    <?php include '../pages/components/card.php'?>
    <?php include '../pages/components/card.php'?>
    <?php include '../pages/components/card.php'?>
    <?php include '../pages/components/card.php'?>
    <?php include '../pages/components/card.php'?>
    <?php include '../pages/components/card.php'?>
    </div>
</body>
</html>