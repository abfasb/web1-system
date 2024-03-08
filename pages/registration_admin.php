<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebStay</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body class = " w-full h-full flex justify-center" style = "background: url('../assets/img/hotel-bg.png'); background-position: center; background-attachment: scroll;">
<div class="max-w-2xl flex w-full" style = "background: rgba( 255, 255, 255, 0.25 );
box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 4px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );">

<form class="shadow-lg p-6 w-full mx-auto">

<div class="grid gap-6 mb-6 lg:grid-cols-2">
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First name</label>
        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
    </div>
    <div>
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last name</label>
        <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
    </div>
    <div>
        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company</label>
        <input type="text" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
    </div>  
    <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
        <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
    </div>
    <div>
        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Website URL</label>
        <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required>
    </div>
    <div>
        <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Unique visitors (per month)</label>
        <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
    </div>
</div>
<div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" required>
</div> 
<div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
</div> 
<div class="mb-6">
    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm password</label>
    <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
</div> 
<div class="flex items-start mb-6">
    <div class="flex items-center h-5">
    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
    </div>
    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I agree with the <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-blue-600 hover:underline dark:text-blue-500">Terms and Conditions</button>.</label>
            
</div>
<div class = " w-full flex justify-center">
<button type="submit" class="text-white p-20 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full flex-grow px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>

</div>
</form>

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