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
        .scrolls::-webkit-scrollbar {
          width: 7px;
         }
        
        .scrolls::-webkit-scrollbar-thumb {
            border-radius: 2px;
            background-color: #f82c0d;
         }
    </style>
</head> 
<body style = "height: 300vh; overflow-x: hidden; ">
    <?php include '../pages/home.php'?>
    <br>
    <br>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,900&display=swap" rel="stylesheet" />
<style>
  * {
  font-family: 'Source Sans Pro';
  }
</style>
<div class="flex min-h-screen w-screen">
  <div class="relative my-auto mx-auto flex flex-col px-4 sm:max-w-xl md:max-w-screen-xl md:flex-row">
    <div class="mx-auto flex w-full max-w-xl lg:max-w-screen-xl">
      <div class="mb-16 lg:my-auto lg:max-w-lg">
        <div class="mb-6 max-w-xl">
          <div>
            <p class="bg-teal-accent-400 mb-2 inline-block rounded-full bg-lime-300 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-indigo-900 sm:mt-4">25% off this summer</p>
          </div>
          <h2 class="mb-6 max-w-lg text-3xl font-extrabold text-slate-700 sm:text-5xl sm:leading-snug">
          Shop with Confidence at
            <span class="rounded- abg-gradient-to-r inline-block bg-sky-400 from-lime-400 to-sky-400 px-2 font-bold text-white">ShopSphere!</span>
          </h2>
          <p class="text-base text-gray-700 md:text-lg">Explore a curated selection at ShopSphere. MainHome invites discovery, while MainMenu offers personalized deals post-login. Experience seamless shopping!</p>
        </div>
        <div class="flex items-center">
          <a href="../pages/registration.php" class="bg-sky-400a mr-6 inline-flex h-12 items-center justify-center rounded-full bg-gradient-to-r from-lime-400 to-sky-400 px-8 font-medium tracking-wide text-white shadow-lg shadow-sky-300 outline-none transition duration-200 hover:scale-110 hover:bg-sky-500 focus:ring"> Get started </a>
          <a href="/" class="inline-flex items-center font-semibold text-sky-400 transition-colors duration-200 hover:text-lime-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
            </svg>
            Watch Videos</a
          >
        </div>
      </div>
    </div>

    <div class="flex h-full w-full space-x-3 overflow-hidden md:justify-end">
      <!-- Col 2 -->
      <div class="hidden w-56 items-center space-y-3 lg:flex">
        <div class="overflow-hidden rounded-xl bg-yellow-400">
          <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1544376798-89aa6b82c6cd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
        </div>
      </div>
      <div class="w-full flex-col space-y-3 rounded-xl py-4 lg:flex lg:w-80">
        <div class="h-40 overflow-hidden rounded-xl bg-green-600/60">
          <img class="mx-auto h-full w-full object-cover" src="https://source.unsplash.com/random/1920x1080?e-commerce=1" alt="" />
        </div>
        <div class="h-40 overflow-hidden rounded-xl bg-pink-600/60">
          <img class="mx-auto h-full w-full object-cover" src="https://source.unsplash.com/random/1920x1080?e-commerce=2" alt="" />
        </div>
        <div class="h-40 overflow-hidden rounded-xl bg-blue-600/60">
          <img class="mx-auto h-full w-full object-cover" src="https://source.unsplash.com/random/1920x1080?e-commerce=3" alt="" />
        </div>
      </div>
    </div>
    <!-- /Right Column -->
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
            <h6 class="mt-12 text-xl text-white sm:text-3xl">Shopping Destination for Eco-Conscious Shoppers.</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-2/5">
        <div class="h-full w-full bg-yellow-400 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-blue-900 sm:text-8xl">Trusted by Thousands</h1>
            <h6 class="mt-12 text-xl text-blue-900 sm:text-3xl">Join the Community of Satisfied Shoppers.</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-indigo-600 p-6">
          <div class="absolute z-0 opacity-0 hover:opacity-50" style="mix-blend-mode:multiply"></div>
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-white sm:text-8xl">100+</h1>
            <h6 class="mt-12 text-xl text-white sm:text-3xl">Products</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-blue-400 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-white sm:text-8xl">100</h1>
            <h6 class="mt-12 text-xl text-white sm:text-3xl">New Users Every Month</h6>
          </div>
        </div>
      </div>
      <div class="mb-4 w-full px-2 lg:w-1/3">
        <div class="h-full w-full bg-red-200 p-6">
          <div class="z-10 flex flex-col justify-between">
            <h1 class="text-4xl text-blue-900 sm:text-8xl">50</h1>
            <h6 class="mt-12 text-xl text-blue-900 sm:text-3xl">Trusted Clients</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tailwindcss-cdn@3.4.1/tailwindcss.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<div x-data="swipeCards()" class= "scrolls" x-init="
			let isDown = false;
			let startX;
			let scrollLeft;
			$el.addEventListener('mousedown', (e) => {
			isDown = true;
			startX = e.pageX - $el.offsetLeft;
			scrollLeft = $el.scrollLeft;
			});
			$el.addEventListener('mouseleave', () => {
			isDown = false;
			});
			$el.addEventListener('mouseup', () => {
			isDown = false;
			});
			$el.addEventListener('mousemove', (e) => {
			if (!isDown) return;
			e.preventDefault();
			const x = e.pageX - $el.offsetLeft;
			const walk = (x - startX) * 1;
			$el.scrollLeft = scrollLeft - walk;
			});
			" class="overflow-x-scroll scrollbar-hide mb-4 relative px-0.5" style="overflow-y: hidden;">
	<div class="flex snap-x snap-mandatory gap-4" style="width: max-content;">
		<template x-for="card in cards" :key="card.id">
			<div class="flex-none w-64 snap-center">
				<div class="bg-white border-1 border border-gray-200 rounded-lg overflow-hidden mb-4">
					<img :src="card.image" alt="" class="w-full h-40 object-cover">
					<div class="p-4">
						<h3 class="text-lg leading-6 font-bold text-gray-900" x-text="card.title"></h3>
						<p class="text-gray-600 mt-2 text-sm" x-text="card.description"></p>
						<div class="flex justify-between items-center mt-4">
							<span class="text-2xl font-extrabold text-gray-900" x-text="'$' + card.price.toFixed(2)"></span>
							<a :href="card.link"
								class="text-white bg-fuchsia-950 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><svg
									xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
									stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
								</svg></a>
						</div>
					</div>
				</div>
			</div>
		</template>
	</div>
</div>
<script>
	function swipeCards() {
			  return {
			    cards: [
			      {
			        id: 1,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Cocktail')}`,
			        title: 'Cocktail',
			        description: 'Tropical mix of flavors, perfect for parties.',
			        price: 8.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 2,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Smoothie')}`,
			        title: 'Smoothie',
			        description: 'Refreshing blend of fruits and yogurt.',
			        price: 5.49,
			        link: 'your_link_here'
			      },
			      {
			        id: 3,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Iced Coffee')}`,
			        title: 'Iced Coffee',
			        description: 'Cold brewed coffee with a hint of vanilla.',
			        price: 4.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 4,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Mojito')}`,
			        title: 'Mojito',
			        description: 'Classic Cuban cocktail with mint and lime.',
			        price: 7.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 5,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Matcha Latte')}`,
			        title: 'Matcha Latte',
			        description: 'Creamy green tea latte, rich in antioxidants.',
			        price: 6.49,
			        link: 'your_link_here'
			      },
			      {
			        id: 6,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Fruit Punch')}`,
			        title: 'Fruit Punch',
			        description: 'Sweet and tangy punch, bursting with fruity flavors.',
			        price: 3.99,
			        link: 'your_link_here'
			      },
			      {
			        id: 7,
			        image: `https://source.unsplash.com/random/300x200?${encodeURIComponent('Bubble Tea')}`,
			        title: 'Bubble Tea',
			        description: 'Chewy tapioca pearls in a sweet milk tea base.',
			        price: 4.99,
			        link: 'your_link_here'
			      }
			    ],
			    addToCart(product) {
			      // Implement your add to cart logic here
			      console.log('Adding to cart:', product);
			    }
			  };
			}
</script>

</body>
</html>