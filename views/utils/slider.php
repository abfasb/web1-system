<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    height: 100vh;
    display: grid;
    place-items: center;
    overflow: hidden;
  }
  
  main {
    height: 100vh;
    display: grid;
    place-items: center;
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 100%;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
  }
  
  .item {
    width: 200px;
    height: 300px;
    list-style-type: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    background-position: center;
    background-size: cover;
    border-radius: 20px;
    box-shadow: 0 20px 30px rgba(255,255,255,0.3) inset;
    transition: transform 0.1s, left 0.75s, top 0.75s, width 0.75s, height 0.75s;
  
    &:nth-child(1), &:nth-child(2) {
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      transform: none;
      border-radius: 0;
      box-shadow: none;
      opacity: 1;
    }
  
    &:nth-child(3) { left: 50%; }
    &:nth-child(4) { left: calc(50% + 220px); }
    &:nth-child(5) { left: calc(50% + 440px); }
    &:nth-child(6) { left: calc(50% + 660px); opacity: 0; }
  }
  
  .content {
    width: min(30vw,400px);
    position: absolute;
    top: 50%;
    left: 3rem;
    transform: translateY(-50%);
    font: 400 0.85rem helvetica,sans-serif;
    color: white;
    text-shadow: 0 3px 8px rgba(0,0,0,0.5);
    opacity: 0;
    display: none;
  
    & .title {
      font-family: 'arial-black';
      text-transform: uppercase;
    }
  
    & .description {
      line-height: 1.7;
      margin: 1rem 0 1.5rem;
      font-size: 0.8rem;
    }
  
    & button {
      width: fit-content;
      background-color: rgba(0,0,0,0.1);
      color: white;
      border: 2px solid white;
      border-radius: 0.25rem;
      padding: 0.75rem;
      cursor: pointer;
    }
  }
  
  .item:nth-of-type(2) .content {
    display: block;
    animation: show 0.75s ease-in-out 0.3s forwards;
  }
  
  @keyframes show {
    0% {
      filter: blur(5px);
      transform: translateY(calc(-50% + 75px));
    }
    100% {
      opacity: 1;
      filter: blur(0);
    }
  }
  
  .nav {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 5;
    user-select: none;
  
    & .btn {
      background-color: rgba(255,255,255,0.5);
      color: rgba(0,0,0,0.7);
      border: 2px solid rgba(0,0,0,0.6);
      margin: 0 0.25rem;
      padding: 0.75rem;
      border-radius: 50%;
      cursor: pointer;
  
      &:hover {
        background-color: rgba(255,255,255,0.3);
      }
    }
  }
  
  @media (width > 650px) and (width < 900px) {
    .content {
      & .title        { font-size: 1rem; }
      & .description  { font-size: 0.7rem; }
      & button        { font-size: 0.7rem; }
    }
    .item {
      width: 160px;
      height: 270px;
  
      &:nth-child(3) { left: 50%; }
      &:nth-child(4) { left: calc(50% + 170px); }
      &:nth-child(5) { left: calc(50% + 340px); }
      &:nth-child(6) { left: calc(50% + 510px); opacity: 0; }
    }
  }
  
  @media (width < 650px) {
    .content {
      & .title        { font-size: 0.9rem; }
      & .description  { font-size: 0.65rem; }
      & button        { font-size: 0.7rem; }
    }
    .item {
      width: 130px;
      height: 220px;
  
      &:nth-child(3) { left: 50%; }
      &:nth-child(4) { left: calc(50% + 140px); }
      &:nth-child(5) { left: calc(50% + 280px); }
      &:nth-child(6) { left: calc(50% + 420px); opacity: 0; }
    }
  }
  .nav-link {
  color: white !important; /* Important to override any other conflicting styles */
}
    </style>
</head>
<body>


<nav class="bg-black text-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
    <a href="../views/MainHome.php" class="flex items-center justify-cente space-x-3 rtl:space-x-reverse">
      <img src="../../assets/img/logoooo.png" class=" w-16 object-cover mt-1" alt="ShopSphere Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ShopSphere</span>
    </a>
    <div class="flex gap-4 hover:border-blue-700 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button id="get-started-btn" type="button" class="text-white z-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
      <button id="sign-up-btn" type="button" class="text-white z-10 border-blue-700 rounded-md p-3 gap-1">Sign In</button>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
      <div class="flow-roo flex items-center h-full justify-center pt-3 ml-4">
        <a href="./cart.php" class="group -m-2 flex items-center p-2">
          <svg class="h-6 w-6 flex-shrink-0 text-gray-100 group-hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
          </svg>
          <span class="ml-2 text-sm font-medium text-white group-hover:text-blue-700">0</span>
        </a>
      </div>
    </div>
    <div class="items-center text-white p-4 justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="bg-black text-white flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 ">
        <li >
          <a href="../MainHome.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Home</a>
        </li>
        <li>
          <a href="../../pages/meet_the_team.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active" aria-current="page">About</a>
        </li>
        <li>
          <a href="../../pages/products.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Products</a>
        </li>
        <li>
          <a href="./slider.php" class="nav-link block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <main>
        <ul class='slider'>
          <li class='item' style="background-image: url('https://t4.ftcdn.net/jpg/06/22/39/91/360_F_622399137_jlEDsEN0pUMZA6jMKShRoq2po69QBQXj.jpg')">
            <div class='content'>
              <h2 class='title'>"Lossless Youths"</h2>
              <p class='description'> Lorem ipsum, dolor sit amet consectetur
              adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
              praesentium nisi. Id laboriosam ipsam enim.  </p>
              <button>Read More</button>
            </div>
          </li>
          <li class='item' style="background-image: url('https://itseeze.com/_webedit/cached-images/2761-0-0-1250-10000-7500-1344.png')">
            <div class='content'>
              <h2 class='title'>"Estrange Bond"</h2>
              <p class='description'> Lorem ipsum, dolor sit amet consectetur
              adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
              praesentium nisi. Id laboriosam ipsam enim.  </p>
              <button>Read More</button>
            </div>
          </li>
          <li class='item' style="background-image: url('https://t3.ftcdn.net/jpg/06/55/48/22/360_F_655482254_1k1yrQACCvforJsBqcLgQgJAuoPSzg3X.jpg')">
            <div class='content'>
              <h2 class='title'>"The Gate Keeper"</h2>
              <p class='description'> Lorem ipsum, dolor sit amet consectetur
              adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
              praesentium nisi. Id laboriosam ipsam enim.  </p>
              <button>Read More</button>
            </div>
          </li>
          <li class='item' style="background-image: url('https://www.octaneai.com/hubfs/octaneai_shoppingcart_quiz_digital.png')">
            <div class='content'>
              <h2 class='title'>"Last Trace Of Us"</h2>
              <p class='description'>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore fuga voluptatum, iure corporis inventore praesentium nisi. Id laboriosam ipsam enim.
              </p>
              <button>Read More</button>
            </div>
          </li>
          <li class='item' style="background-image: url('https://www.intelligentcio.com/apac/wp-content/uploads/sites/44/2023/09/AdobeStock_581856925-1.jpg')">
            <div class='content'>
              <h2 class='title'>"Urban Decay"</h2>
              <p class='description'>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore fuga voluptatum, iure corporis inventore praesentium nisi. Id laboriosam ipsam enim.
              </p>
              <button>Read More</button>
            </div>
          </li>
          <li class='item' style="background-image: url('https://img.freepik.com/premium-vector/ecommerce-online-shopping-marketing-concept-vector-stock-illustration_618588-583.jpg')">
            <div class='content'>
              <h2 class='title'>"The Migration"</h2>
              <p class='description'> Lorem ipsum, dolor sit amet consectetur
              adipisicing elit. Tempore fuga voluptatum, iure corporis inventore
              praesentium nisi. Id laboriosam ipsam enim.  </p>
              <button>Read More</button>
            </div>
          </li>
        </ul>
        <nav class='nav'>
          <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
          <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
        </nav>
      </main>
      
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<script>
    const slider = document.querySelector('.slider');

function activate(e) {
  const items = document.querySelectorAll('.item');
  e.target.matches('.next') && slider.append(items[0])
  e.target.matches('.prev') && slider.prepend(items[items.length-1]);
}

document.addEventListener('click',activate,false);
</script>
</html>