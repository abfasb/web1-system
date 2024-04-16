<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body>
        
  <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">

<div class="fixed inset-0 bg-opacity-25"></div>

<div class="fixed inset-0 z-40 flex">
  <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
    <div class="flex px-4 pb-2 pt-5">
      <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
        <span class="sr-only">Close menu</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Links -->
    <div class="mt-2">
      <div class="border-b border-gray-200">
        <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
          <button id="tabs-1-tab-1" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
          <button id="tabs-1-tab-2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
        </div>
      </div>

      <!-- 'Women' tab panel, show/hide based on tab state. -->
    
            <div>
              <p id="mobile-brand-heading" class="font-medium text-gray-900">Brands</p>
              <ul role="list" aria-labelledby="mobile-brand-heading" class="mt-6 space-y-6">
                <li class="flex">
                  <a href="#" class="text-gray-500">Significant Other</a>
                </li>
                <li class="flex">
                  <a href="#" class="text-gray-500">My Way</a>
                </li>
                <li class="flex">
                  <a href="#" class="text-gray-500">Counterfeit</a>
                </li>
                <li class="flex">
                  <a href="#" class="text-gray-500">Re-Arranged</a>
                </li>
                <li class="flex">
                  <a href="#" class="text-gray-500">Full Nelson</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
      <div class="flow-root">
        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
      </div>
      <div class="flow-root">
        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
      </div>
    </div>

    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
      <div class="flow-root">
        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
      </div>
      <div class="flow-root">
        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
      </div>
    </div>

    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
      <!-- Currency selector -->
      <form>
        <div class="inline-block">
          <label for="mobile-currency" class="sr-only">Currency</label>
          <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
            <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
              <option>CAD</option>
              <option>USD</option>
              <option>AUD</option>
              <option>EUR</option>
              <option>GBP</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
              <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<header class="relative">
<nav aria-label="Top">
  <!-- Top navigation -->
  <div class="bg-gray-900">
    <div class="mx-auto flex h-10 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
      <!-- Currency selector -->
      <form class="hidden lg:block lg:flex-1">
        <div class="flex">
          <label for="desktop-currency" class="sr-only">Currency</label>
          <div class="group relative -ml-2 rounded-md border-transparent bg-gray-900 focus-within:ring-2 focus-within:ring-white">
            <select id="desktop-currency" name="currency" class="flex items-center rounded-md border-transparent bg-gray-900 bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-white focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-100">
              <option>CAD</option>
              <option>USD</option>
              <option>AUD</option>
              <option>EUR</option>
              <option>GBP</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
              <svg class="h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
      </form>

      <p class="flex-1 text-center text-sm font-medium text-white lg:flex-none">Get free delivery on orders over $100</p>

      <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
        <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Create an account</a>
        <span class="h-6 w-px bg-gray-600" aria-hidden="true"></span>
        <a href="#" class="text-sm font-medium text-white hover:text-gray-100">Sign in</a>
      </div>
    </div>
  </div>

  <!-- Secondary navigation -->
  <div class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="border-b border-gray-200">
        <div class="flex h-16 items-center justify-between">
          <!-- Logo (lg+) -->
          <div class="hidden lg:flex lg:items-center">
            <a href="#">
              <span class="sr-only">Your Company</span>
              <img class="h-8 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/603px-Amazon_logo.svg.png?20220213013322" alt="">
            </a>
          </div>

          <div class="hidden h-full lg:flex">
            <!-- Mega menus -->
            <div class="ml-8">
              <div class="flex h-full justify-center space-x-8">
                <div class="flex">
                  <div class="relative flex">
                    <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                    <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">Women</button>
                  </div>

                  <!--
                    'Women' mega menu, show/hide based on flyout menu state.

                    Entering: "transition ease-out duration-200"
                      From: "opacity-0"
                      To: "opacity-100"
                    Leaving: "transition ease-in duration-150"
                      From: "opacity-100"
                      To: "opacity-0"
                  -->
                  <div class="absolute inset-x-0 top-full z-10 text-gray-500 sm:text-sm">
                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                    <div class="relative bg-white">
                      <div class="mx-auto max-w-7xl px-8">
                        <div class="grid grid-cols-2 items-start gap-x-8 gap-y-10 pb-12 pt-10">
                          <div class="grid grid-cols-2 gap-x-8 gap-y-10">
                            <div>
                              <p id="desktop-featured-heading-0" class="font-medium text-gray-900">Featured</p>
                              <ul role="list" aria-labelledby="desktop-featured-heading-0" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sleep</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Swimwear</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Underwear</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="desktop-categories-heading" class="font-medium text-gray-900">Categories</p>
                              <ul role="list" aria-labelledby="desktop-categories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Basic Tees</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Artwork Tees</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Bottoms</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Underwear</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Accessories</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="grid grid-cols-2 gap-x-8 gap-y-10">
                            <div>
                              <p id="desktop-collection-heading" class="font-medium text-gray-900">Collection</p>
                              <ul role="list" aria-labelledby="desktop-collection-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Everything</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Core</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">New Arrivals</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sale</a>
                                </li>
                              </ul>
                            </div>

                            <div>
                              <p id="desktop-brand-heading" class="font-medium text-gray-900">Brands</p>
                              <ul role="list" aria-labelledby="desktop-brand-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">My Way</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Significant Other</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex">
                  <div class="relative flex">
                    <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                    <button type="button" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out" aria-expanded="false">Men</button>
                  </div>

                  <!--
                    'Men' mega menu, show/hide based on flyout menu state.

                    Entering: "transition ease-out duration-200"
                      From: "opacity-0"
                      To: "opacity-100"
                    Leaving: "transition ease-in duration-150"
                      From: "opacity-100"
                      To: "opacity-0"
                  -->
                  <div class="absolute inset-x-0 top-full z-10 text-gray-500 sm:text-sm">
                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                    <div class="relative bg-white">
                      <div class="mx-auto max-w-7xl px-8">
                        <div class="grid grid-cols-2 items-start gap-x-8 gap-y-10 pb-12 pt-10">
                          <div class="grid grid-cols-2 gap-x-8 gap-y-10">
                            <div>
                              <p id="desktop-featured-heading-1" class="font-medium text-gray-900">Featured</p>
                              <ul role="list" aria-labelledby="desktop-featured-heading-1" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Casual</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Boxers</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Outdoor</a>
                                </li>
                              </ul>
                            </div>
                            <div>
                              <p id="desktop-categories-heading" class="font-medium text-gray-900">Categories</p>
                              <ul role="list" aria-labelledby="desktop-categories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Artwork Tees</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Pants</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Accessories</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Boxers</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Basic Tees</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="grid grid-cols-2 gap-x-8 gap-y-10">
                            <div>
                              <p id="desktop-collection-heading" class="font-medium text-gray-900">Collection</p>
                              <ul role="list" aria-labelledby="desktop-collection-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Everything</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Core</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">New Arrivals</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Sale</a>
                                </li>
                              </ul>
                            </div>

                            <div>
                              <p id="desktop-brand-heading" class="font-medium text-gray-900">Brands</p>
                              <ul role="list" aria-labelledby="desktop-brand-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Significant Other</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">My Way</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Counterfeit</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Re-Arranged</a>
                                </li>
                                <li class="flex">
                                  <a href="#" class="hover:text-gray-800">Full Nelson</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Company</a>
                <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
              </div>
            </div>
          </div>

          <!-- Mobile menu and search (lg-) -->
          <div class="flex flex-1 items-center lg:hidden">
            <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
            <button type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400">
              <span class="sr-only">Open menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>

            <!-- Search -->
            <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
              <span class="sr-only">Search</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
              </svg>
            </a>
          </div>

          <!-- Logo (lg-) -->
          <a href="#" class="lg:hidden">
            <span class="sr-only">Your Company</span>
            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" class="h-8 w-auto">
          </a>

          <div class="flex flex-1 items-center justify-end">
            <div class="flex items-center lg:ml-8">
              <div class="flex space-x-8">
                <div class="hidden lg:flex">
                  <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Search</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                  </a>
                </div>

                <div class="flex">
                  <a href="#" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Account</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                  </a>
                </div>
              </div>

              <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true"></span>

              <div class="flow-root">
                <a href="#" class="group -m-2 flex items-center p-2">
                  <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
                  <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                  <span class="sr-only">items in cart, view bag</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
</header>

<main class="pt-10 sm:pt-16">
<nav aria-label="Breadcrumb">
  <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
    <li>
      <div class="flex items-center">
        <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
          <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
        </svg>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <a href="#" class="mr-2 text-sm font-medium text-gray-900">Clothing</a>
        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
          <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
        </svg>
      </div>
    </li>

    <li class="text-sm">
      <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Basic Tee 6-Pack</a>
    </li>
  </ol>
</nav>

<!-- Image gallery -->
<div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
  <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg" alt="Two each of gray, white, and black shirts laying flat." class="h-full w-full object-cover object-center">
  </div>
  <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
      <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
    </div>
    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
      <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
    </div>
  </div>
  <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
  </div>
</div>

<!-- Product info -->
<div class="mx-auto max-w-2xl px-4 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16">
  <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Basic Tee 6-Pack</h1>
  </div>

  <!-- Options -->
  <div class="mt-4 lg:row-span-3 lg:mt-0">
    <h2 class="sr-only">Product information</h2>
    <p class="text-3xl tracking-tight text-gray-900">$192</p>

    <!-- Reviews -->
    <div class="mt-6">
      <h3 class="sr-only">Reviews</h3>
      <div class="flex items-center">
        <div class="flex items-center">
          <!-- Active: "text-gray-900", Default: "text-gray-200" -->
          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
        </div>
        <p class="sr-only">4 out of 5 stars</p>
        <a href="#" class="ml-3 text-sm font-medium text-teal-600 hover:text-cyan-500">117 reviews</a>
      </div>
    </div>

    <form class="mt-10">
      <!-- Colors -->
      <div>
        <h3 class="text-sm font-medium text-gray-900">Color</h3>

        <fieldset class="mt-4">
          <legend class="sr-only">Choose a color</legend>
          <div class="flex items-center space-x-3">
            <!--
              Active and Checked: "ring ring-offset-1"
              Not Active and Checked: "ring-2"
            -->
            <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
              <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-0-label">
              <span id="color-choice-0-label" class="sr-only">White</span>
              <span aria-hidden="true" class="h-8 w-8 bg-white rounded-full border border-black border-opacity-10"></span>
            </label>
            <!--
              Active and Checked: "ring ring-offset-1"
              Not Active and Checked: "ring-2"
            -->
            <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-400">
              <input type="radio" name="color-choice" value="Gray" class="sr-only" aria-labelledby="color-choice-1-label">
              <span id="color-choice-1-label" class="sr-only">Gray</span>
              <span aria-hidden="true" class="h-8 w-8 bg-gray-200 rounded-full border border-black border-opacity-10"></span>
            </label>
            <!--
              Active and Checked: "ring ring-offset-1"
              Not Active and Checked: "ring-2"
            -->
            <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-gray-900">
              <input type="radio" name="color-choice" value="Black" class="sr-only" aria-labelledby="color-choice-2-label">
              <span id="color-choice-2-label" class="sr-only">Black</span>
              <span aria-hidden="true" class="h-8 w-8 bg-gray-900 rounded-full border border-black border-opacity-10"></span>
            </label>
          </div>
        </fieldset>
      </div>

      <!-- Sizes -->
      <div class="mt-10">
        <div class="flex items-center justify-between">
          <h3 class="text-sm font-medium text-gray-900">Size</h3>
          <a href="#" class="text-sm font-medium text-yellow-600 hover:text-blue-500">Size guide</a>
        </div>

        <fieldset class="mt-4">
          <legend class="sr-only">Choose a size</legend>
          <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-not-allowed bg-gray-50 text-gray-200">
              <input type="radio" name="size-choice" value="XXS" disabled class="sr-only" aria-labelledby="size-choice-0-label">
              <span id="size-choice-0-label">XXS</span>
              <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                  <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                </svg>
              </span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="XS" class="sr-only" aria-labelledby="size-choice-1-label">
              <span id="size-choice-1-label">XS</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="S" class="sr-only" aria-labelledby="size-choice-2-label">
              <span id="size-choice-2-label">S</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="M" class="sr-only" aria-labelledby="size-choice-3-label">
              <span id="size-choice-3-label">M</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="L" class="sr-only" aria-labelledby="size-choice-4-label">
              <span id="size-choice-4-label">L</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="XL" class="sr-only" aria-labelledby="size-choice-5-label">
              <span id="size-choice-5-label">XL</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="2XL" class="sr-only" aria-labelledby="size-choice-6-label">
              <span id="size-choice-6-label">2XL</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
            <!-- Active: "ring-2 ring-indigo-500" -->
            <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
              <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
              <span id="size-choice-7-label">3XL</span>
              <!--
                Active: "border", Not Active: "border-2"
                Checked: "border-indigo-500", Not Checked: "border-transparent"
              -->
              <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
            </label>
          </div>
        </fieldset>
      </div>

      <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-gray-800 px-8 py-3 text-base font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Add to bag</button>
    </form>
  </div>

  <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
    <!-- Description and details -->
    <div>
      <h3 class="sr-only">Description</h3>

      <div class="space-y-6">
        <p class="text-base text-gray-900">The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: &quot;Black&quot;. Need to add an extra pop of color to your outfit? Our white tee has you covered.</p>
      </div>
    </div>

    <div class="mt-10">
      <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

      <div class="mt-4">
        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
          <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>
          <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>
          <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>
          <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
        </ul>
      </div>
    </div>

    <section aria-labelledby="shipping-heading" class="mt-10">
      <h2 id="shipping-heading" class="text-sm font-medium text-gray-900">Details</h2>

      <div class="mt-4 space-y-6">
        <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
      </div>
    </section>
  </div>

  <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
    <!-- Reviews -->
    <section aria-labelledby="reviews-heading" class="border-t border-gray-200 pt-10 lg:pt-16">
      <h2 id="reviews-heading" class="sr-only">Reviews</h2>

      <div class="space-y-10">
        <div class="flex flex-col sm:flex-row">
          <div class="order-2 mt-6 sm:ml-16 sm:mt-0">
            <h3 class="text-sm font-medium text-gray-900">This is the best white t-shirt out there</h3>
            <p class="sr-only">5 out of 5 stars</p>

            <div class="mt-3 space-y-6 text-sm text-gray-600">
              <p>I've searched my entire life for a t-shirt that reflects every color in the visible spectrum. Scientists said it couldn't be done, but when I look at this shirt, I see white light bouncing right back into my eyes. Incredible!</p>
            </div>
          </div>

          <div class="order-1 flex items-center sm:flex-col sm:items-start">
            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixqx=oilqXxSqey&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Mark Edwards." class="h-12 w-12 rounded-full">

            <div class="ml-4 sm:ml-0 sm:mt-4">
              <p class="text-sm font-medium text-gray-900">Mark Edwards</p>
              <div class="mt-2 flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row">
          <div class="order-2 mt-6 sm:ml-16 sm:mt-0">
            <h3 class="text-sm font-medium text-gray-900">Adds the perfect variety to my wardrobe</h3>
            <p class="sr-only">4 out of 5 stars</p>

            <div class="mt-3 space-y-6 text-sm text-gray-600">
              <p>I used to be one of those unbearable minimalists who only wore the same black v-necks every day. Now, I have expanded my wardrobe with three new crewneck options! Leaving off one star only because I wish the heather gray was more gray.</p>
            </div>
          </div>

          <div class="order-1 flex items-center sm:flex-col sm:items-start">
            <img src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80" alt="Blake Reid." class="h-12 w-12 rounded-full">

            <div class="ml-4 sm:ml-0 sm:mt-4">
              <p class="text-sm font-medium text-gray-900">Blake Reid</p>
              <div class="mt-2 flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row">
          <div class="order-2 mt-6 sm:ml-16 sm:mt-0">
            <h3 class="text-sm font-medium text-gray-900">All good things come in 6-Packs</h3>
            <p class="sr-only">5 out of 5 stars</p>

            <div class="mt-3 space-y-6 text-sm text-gray-600">
              <p>Tasty beverages, strong abs that will never be seen due to aforementioned tasty beverages, and these Basic Tees!</p>
            </div>
          </div>

          <div class="order-1 flex items-center sm:flex-col sm:items-start">
            <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Ben Russel." class="h-12 w-12 rounded-full">

            <div class="ml-4 sm:ml-0 sm:mt-4">
              <p class="text-sm font-medium text-gray-900">Ben Russel</p>
              <div class="mt-2 flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<section aria-labelledby="related-products-heading" class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 id="related-products-heading" class="text-xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <div class="group relative">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
        </div>
        <div class="mt-4 flex justify-between">
          <div>
            <h3 class="text-sm text-gray-700">
              <a href="#">
                <span aria-hidden="true" class="absolute inset-0"></span>
                Basic Tee
              </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">Black</p>
          </div>
          <p class="text-sm font-medium text-gray-900">$35</p>
        </div>
      </div>

      <!-- More products... -->
    </div>
  </div>
</section>
</main>

<footer aria-labelledby="footer-heading" class="border-t border-gray-200 bg-white">
<h2 id="footer-heading" class="sr-only">Footer</h2>
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
  <div class="grid grid-cols-2 gap-8 py-20 sm:grid-cols-2 sm:gap-y-0 lg:grid-cols-4">
    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
      <div>
        <h3 class="text-sm font-medium text-gray-900">Account</h3>
        <ul role="list" class="mt-6 space-y-6">
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Manage Account</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Saved Items</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Orders</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Redeem Gift card</a>
          </li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-medium text-gray-900">Service</h3>
        <ul role="list" class="mt-6 space-y-6">
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Shipping &amp; Returns</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Warranty</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">FAQ</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Find a store</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Get in touch</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-y-10 lg:col-span-2 lg:grid-cols-2 lg:gap-x-8 lg:gap-y-0">
      <div>
        <h3 class="text-sm font-medium text-gray-900">Company</h3>
        <ul role="list" class="mt-6 space-y-6">
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Who we are</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Press</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Careers</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Terms &amp; Conditions</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Privacy</a>
          </li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-medium text-gray-900">Connect</h3>
        <ul role="list" class="mt-6 space-y-6">
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Facebook</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Instagram</a>
          </li>
          <li class="text-sm">
            <a href="#" class="text-gray-500 hover:text-gray-600">Pinterest</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="border-t border-gray-100 py-10 sm:flex sm:items-center sm:justify-between">
    <div class="flex items-center justify-center text-sm text-gray-500">
      <p>Shipping to Canada ($CAD)</p>
      <p class="ml-3 border-l border-gray-200 pl-3">English</p>
    </div>
    <p class="mt-6 text-center text-sm text-gray-500 sm:mt-0">&copy; 2021 Your Company, Inc.</p>
  </div>
</div>
</footer>
</div>
</body>
</html>