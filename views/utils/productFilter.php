<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
    
  <body class="bg-gray-800 text-white">
    <nav class="bg-gray-900 p-4 mt-14">
      <div
        class="container max-w-6xl mx-auto flex flex-col sm:flex-row gap-8 items-center"
      >
        <div class="relative w-full">
          <input
            type="text"
            id="search"
            class="bg-gray-700 rounded-full p-2 pl-10 transition focus:w-full"
            placeholder="Search products..."
          />
          <svg
            class="absolute left-2 top-1/2 -translate-y-1/2"
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
          </svg>
        </div>

        <!-- Cart icon -->
        <span class="relative text-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            #
            height="24"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z"
            />
            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
          </svg>
          <small
            id="cart-count"
            class="bg-red-500 text-xs text-white w-4 h-4 absolute -top-2 -right-2 rounded-full"
            >0</small
          >
        </span>
      </div>
    </nav>

    <main class="flex flex-col md:flex-row container mx-auto max-w-6xl">
      <div class="space-y-4 p-2 w-full md:max-w-[10rem]">
        <h2 class="text-2xl">Filters</h2>
        <h3 class="text-xl mb-2">Category</h3>
        <div id="filters-container" class="text-xl space-y-2">
          <div>
            <input type="checkbox" class="check" id="cameras" />
            <label for="cameras">Cameras</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="smartphones" />
            <label for="smartphones">Smartphones</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="games" />
            <label for="games">Games</label>
          </div>
          <div>
            <input type="checkbox" class="check" id="televisions" />
            <label for="televisions">Televisions</label>
          </div>
        </div>
      </div>

      <!-- Products wrapper -->
      <div
        id="products-wrapper"
        class="w-full max-w-4xl mx-auto grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-6 place-content-center p-4"
      ></div>
    </main>
    
    <?php include 'MainProductFilter.php' ?>
</body>
</html>


<script>
        const products = [
  {
    name: 'Sony Playstation 5',
    url: 'https://i.ibb.co/zHmZnWx/playstation-5.png',
    category: 'games',
    price: 499.99,
  },
  {
    name: 'Samsung Galaxy',
    url: 'https://i.ibb.co/rFFMDH7/samsung-galaxy.png',
    category: 'smartphones',
    price: 399.99,
  },
  {
    name: 'Cannon EOS Camera',
    url: 'https://i.ibb.co/mhm1hLq/cannon-eos-camera.png',
    category: 'cameras',
    price: 749.99,
  },
  {
    name: 'Sony A7 Camera',
    url: 'https://i.ibb.co/LS9TDLN/sony-a7-camera.png',
    category: 'cameras',
    price: 1999.99,
  },
  {
    name: 'LG TV',
    url: 'https://i.ibb.co/QHgFnHk/lg-tv.png',
    category: 'televisions',
    price: 799.99,
  },
  {
    name: 'Nintendo Switch',
    url: 'https://i.ibb.co/L0L9SdG/nintendo-switch.png',
    category: 'games',
    price: 299.99,
  },
  {
    name: 'Xbox Series X',
    url: 'https://i.ibb.co/C8rBVdT/xbox-series-x.png',
    category: 'games',
    price: 499.99,
  },
  {
    name: 'Samsung TV',
    url: 'https://i.ibb.co/Pj1nm4B/samsung-tv.png',
    category: 'televisions',
    price: 1099.99,
  },
  {
    name: 'Google Pixel',
    url: 'https://i.ibb.co/5F58zmH/google-pixel.png',
    category: 'smartphones',
    price: 499.99,
  },
  {
    name: 'Sony ZV1F Camera',
    url: 'https://i.ibb.co/5Wy3RZ9/sony-zv1f-camera.png',
    category: 'cameras',
    price: 799.99,
  },
  {
    name: 'Toshiba TV',
    url: 'https://i.ibb.co/FxM6rXq/toshiba-tv.png',
    category: 'televisions',
    price: 499.99,
  },
  {
    name: 'iPhone 14',
    url: 'https://i.ibb.co/5vc7J6s/iphone-14.png',
    category: 'smartphones',
    price: 999.99,
  },
];

// Get DOM elements
const productsWrapper = document.getElementById('products-wrapper');
const checkboxes = document.querySelectorAll('.check');
const filtersContainer = document.getElementById('filters-container');
const searchInput = document.getElementById('search');
const cartButton = document.getElementById('cart-button');
const cartCount = document.getElementById('cart-count');

// Initialize cart item count
let cartItemCount = 0;

// Initialize products
const productElements = [];

// Loop over the products and create the product elements
products.forEach((product) => {
  const productElement = createProductElement(product);
  productElements.push(productElement);
  productsWrapper.appendChild(productElement);
});

// Add filter event listeners
filtersContainer.addEventListener('change', filterProducts);
searchInput.addEventListener('input', filterProducts);

// Create product element
function createProductElement(product) {
  const productElement = document.createElement('div');

  productElement.className = 'item space-y-2';

  productElement.innerHTML = `<div
  class="bg-gray-100 flex justify-center relative overflow-hidden group cursor-pointer border rounded-xl"
>
  <img
    src="${product.url}"
    alt="${product.name}"
    class="w-full h-full object-cover"
  />
  <button class="status bg-black text-white absolute bottom-0 left-0 right-0 text-center py-2 translate-y-full transition group-hover:translate-y-0"
    >Add To Cart</button
  >
</div>
<p class="text-xl">${product.name}</p>
<strong>$${product.price.toLocaleString()}</strong>`;

  productElement
    .querySelector('.status')
    .addEventListener('click', updateCart);

  return productElement;
}

// Toggle add/remove from cart
function updateCart(e) {
  const statusEl = e.target;

  if (statusEl.classList.contains('added')) {
    // Remove from cart
    statusEl.classList.remove('added');
    statusEl.innerText = 'Add To Cart';
    statusEl.classList.remove('bg-red-600');
    statusEl.classList.add('bg-gray-800');

    cartItemCount--;
  } else {
    // Add to cart
    statusEl.classList.add('added');
    statusEl.innerText = 'Remove From Cart';
    statusEl.classList.remove('bg-gray-800');
    statusEl.classList.add('bg-red-600');

    cartItemCount++;
  }

  // Update cart item count
  cartCount.innerText = cartItemCount.toString();
}

// Filter products by search or checkbox
function filterProducts() {
  // Get search term
  const searchTerm = searchInput.value.trim().toLowerCase();
  // Get checked categories
  const checkedCategories = Array.from(checkboxes)
    .filter((check) => check.checked)
    .map((check) => check.id);

  // Loop over products and check for matches
  productElements.forEach((productElement, index) => {
    const product = products[index];

    // Check to see if product matches the search or checked items
    const matchesSearchTerm = product.name.toLowerCase().includes(searchTerm);
    const isInCheckedCategory =
      checkedCategories.length === 0 ||
      checkedCategories.includes(product.category);

    // Show or hide product based on matches
    if (matchesSearchTerm && isInCheckedCategory) {
      productElement.classList.remove('hidden');
    } else {
      productElement.classList.add('hidden');
    }
  });
}

    </script>