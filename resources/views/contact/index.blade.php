@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl font-bold text-center text-brown-700 mb-8">Get in Touch</h1>
        <p class="text-center text-gray-600 mb-16">We'd love to hear from fellow dog lovers! Reach out to us through any of the ways below.</p>

        <!-- Contact Details -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-brown-700 mb-4">Contact Details</h2>
            <p class="text-gray-700 mb-8">Feel free to bark at us via email, call, or visit our little dog-friendly spot!</p>

            <div class="mt-6 flex items-center space-x-4">
                <!-- Email Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill w-6 h-6 text-blue-500" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                </svg>
                <p class="text-gray-600">hello@dogblog.com</p>
            </div>

            <div class="mt-6 flex items-center space-x-4">
                <!-- Phone Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill w-6 h-6 text-green-500" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg>
                <p class="text-gray-600">+1 234 567 890</p>
            </div>

            <div class="mt-6 flex items-center space-x-4">
                <!-- Address Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 text-red-500 bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                </svg>
                <p class="text-gray-600">123 Puppy Lane, Dogtown, DT 56789</p>
            </div>

        </div>

        <!-- Business Hours -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-brown-700 mb-4">When We're Around</h2>
            <p class="text-gray-700 mb-8">Whether you need dog care tips or just want to chat about our four-legged friends, these are our hours:</p>

            <ul class="mt-6 text-gray-600 space-y-4">
                <li><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                <li><strong>Saturday:</strong> 10:00 AM - 4:00 PM</li>
                <li><strong>Sunday:</strong> Closed (Busy playing fetch!)</li>
            </ul>
        </div>

        <!-- FAQ -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-brown-700 mb-4">Frequently Asked Questions</h2>

            <div class="mt-6">
                <h3 class="mt-6 text-lg font-medium text-gray-800">Can I send pictures of my dog?</h3>
                <p class="mt-6 text-gray-600 mb-6">Absolutely! We love featuring adorable pups on our blog. Just email us with a short story about your furry friend.</p>
            </div>

            <div class="mt-6">
                <h3 class="mt-6 text-lg font-medium text-gray-800">How often do you post new blog content?</h3>
                <p class="mt-6 text-gray-600 mb-6">We post new stories, tips, and updates every week! Follow us on social media for the latest posts.</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-brown-700 mb-4">Follow Us on Social Media</h2>
            <p class="text-gray-700 mb-8">Stay updated with our latest dog stories, tips, and community events!</p>

            <div class="mt-6 flex space-x-6">
                <a href="#" class="text-blue-500 hover:text-blue-700">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.88v-6.985H7.898V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.096 0 2.238.195 2.238.195v2.459h-1.26c-1.243 0-1.63.775-1.63 1.57V12h2.773l-.443 2.895h-2.33v6.985C18.343 21.128 22 16.99 22 12z"/>
                    </svg>
                </a>

                <a href="#" class="text-blue-400 hover:text-blue-600">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 001.88-2.37 8.51 8.51 0 01-2.71 1.03 4.3 4.3 0 00-7.34 3.91 12.2 12.2 0 01-8.85-4.48 4.29 4.29 0 001.33 5.72A4.22 4.22 0 012 9.69v.05a4.29 4.29 0 003.44 4.21 4.31 4.31 0 01-1.93.07 4.3 4.3 0 004.02 2.98 8.61 8.61 0 01-5.33 1.84A8.35 8.35 0 010 19.54a12.13 12.13 0 006.58 1.93c7.89 0 12.21-6.53 12.21-12.2 0-.18 0-.36-.01-.54A8.67 8.67 0 0022.46 6z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/cheryl7114" target="_blank">
                    <svg class="w-9 h-9" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                        <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"></stop><stop offset=".328" stop-color="#ff543f"></stop><stop offset=".348" stop-color="#fc5245"></stop><stop offset=".504" stop-color="#e64771"></stop><stop offset=".643" stop-color="#d53e91"></stop><stop offset=".761" stop-color="#cc39a4"></stop><stop offset=".841" stop-color="#c837ab"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"></stop><stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"></path><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"></path>
                    </svg>
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
