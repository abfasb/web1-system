<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay Home</title>
    <link rel="stylesheet" href="../public/output.css">
    <style>
        ::-webkit-scrollbar {
          width: 7px;
         }
        
        ::-webkit-scrollbar-thumb {
            border-radius: 2px;
            background-color: #f82c0d;
         }
    </style>
</head> 
<body style = "height: 300vh ">
    <?php include './utils/nav.php'?>
    <br>
    <br>
    <br>
    <br>
    <div class = " flex flex-row items-center justify-between sm:flex-col" style = "background-color: #F6F3E9">
        <div class = "w-1/2 h-full p-12">
            <h1 class = " ">Hotel For <span class = " text-3xl">Memorable</span></h1>
            <button>Click here</button>
        </div>
        <div class = "bg-red-200 relative right-0">
        <img src="../assets/img/home/homebuild.png" alt="Home Image">
        </div>
    </div>

</body>
</html>