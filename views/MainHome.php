<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay Home</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <?php include '../pages/home.php'?>
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

    <div class="w-screen bg-white sm:px-4 xl:px-12">
  <div class="z-10 mx-auto w-full px-6 py-12 sm:px-8 sm:py-16 lg:px-10 xl:px-16">
    <div class="mb-12">
      <div class="lg:flex-no-wrap -mx-3 flex flex-row flex-wrap items-end">
        <div class="mr-auto w-full flex-grow px-3">
          <h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">Valley's Go to Marketing Studio</h3>
        </div>
      </div>
    </div>
    <div class="-mx-2 flex flex-wrap font-bold">
      <div class="mb-4 w-full px-2 lg:w-3/5">
        <div class="h-full w-full bg-blue-900 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-white sm:text-8xl">#1</h1>
            <h6 class="mt-12 text-xl text-white sm:text-3xl">Marketing Studio in the Bay Area.</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-2/5">
        <div class="h-full w-full bg-yellow-400 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-blue-900 sm:text-8xl">FDA</h1>
            <h6 class="mt-12 text-xl text-blue-900 sm:text-3xl">Approved by FDA and 25 other organizations.</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-indigo-600 p-6">
          <div class="absolute z-0 opacity-0 hover:opacity-50" style="mix-blend-mode:multiply"></div>
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-white sm:text-8xl">70+</h1>
            <h6 class="mt-12 text-xl text-white sm:text-3xl">Awards</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-blue-400 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-white sm:text-8xl">12k</h1>
            <h6 class="mt-12 text-xl text-white sm:text-3xl">New Users Every Month</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-red-200 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-blue-900 sm:text-8xl">23</h1>
            <h6 class="mt-12 text-xl text-blue-900 sm:text-3xl">Fortune 500 Clients</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>