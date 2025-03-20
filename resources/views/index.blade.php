@extends('layouts.app')

@section('content')
<div class="relative background-image">
    <!-- Blurred overlay -->
    <div class="absolute inset-0 backdrop-blur-md"></div>

    <!-- Centered White Box -->
    <div class="relative flex items-center justify-center h-full px-4">
        <div class="bg-white bg-opacity-50 w-4/5 max-w-5xl h-auto min-h-80 py-10 px-6 sm:px-10 rounded-md shadow-lg text-center flex flex-col justify-center">
            <h1 class="text-gray-900 text-4xl mt-5 font-bold">
                Welcome to Pulabo!
            </h1>
            <h2 class="text-gray-700 py-3 text-2xl font-bold">
                Where every bark tells a story
            </h2>
            <a href="/blog"
               class="mt-6 ml-15 mr-15 inline-block bg-pink-100 py-3 px-6 font-bold text-lg uppercase rounded">
                Explore Pawsome Stories
            </a>
        </div>
    </div>
</div>

<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFUAfyVe3Easiycyh3isP9wDQTYuSmGPsPQvLIJdEYvQ_DsFq5Ez2Nh_QjiS3oZ3B8ZPfK9cZQyIStmQMV1lDPLw" width="700" alt="Happy dog">
    </div>

    <div class="m-auto sm:m-auto text-left w-4/5 block">
        <h2 class="text-3xl font-extrabold text-gray-600">
            Discover the Joy of Dog Companionship
        </h2>

        <p class="py-8 text-gray-500 text-s">
            From training tips to health advice, our dog blog covers everything you need to know about your furry friend.
        </p>

        <p class="font-extrabold text-gray-600 text-s pb-9">
            Whether you're a new dog parent or a seasoned owner, we're here to make your journey with your canine companion more enriching and enjoyable.
        </p>

        <a
            href="/blog"
            class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl hover:bg-blue-600 transition duration-300">
            Read Our Blog
        </a>
    </div>
</div>

<div class="text-center p-15 bg-red-200 ">
    <h2 class="text-2xl pb-5 text-l">
        Everything for your furry friend...
    </h2>

    <span class="font-extrabold block text-4xl py-1">
            Training Guides
        </span>
    <span class="font-extrabold block text-4xl py-1">
            Nutrition Advice
        </span>
    <span class="font-extrabold block text-4xl py-1">
            Health & Wellness
        </span>
    <span class="font-extrabold block text-4xl py-1">
            Fun Activities
        </span>
</div>

<div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Tail-Wagging Content
        </span>

    <h2 class="text-4xl font-bold py-10">
        Featured Posts
    </h2>

    <p class="m-auto w-4/5 text-gray-500">
        Dive into our most popular articles that help dog owners provide the best care, training, and love for their four-legged family members.
    </p>
</div>

<div class="sm:grid grid-cols-2 w-4/5 m-auto">
    <div class="flex bg-purple-400 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    TRAINING
                </span>

            <h3 class="text-xl font-bold py-10">
                10 Essential Commands Every Dog Should Know - Teaching your furry friend these basic commands can make your life easier and keep your dog safe in potentially dangerous situations.
            </h3>

            <a
                href="/blog"
                class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-gray-100 hover:text-purple-400 transition duration-300">
                Read Full Article
            </a>
        </div>
    </div>
    <div>
        <img src="https://images.unsplash.com/photo-1544568100-847a948585b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="Dog training">
    </div>
</div>

<div class="sm:grid grid-cols-2 w-4/5 m-auto mt-10">
    <div>
        <img src="https://images.unsplash.com/photo-1554456854-55a089fd4cb2?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" alt="Dog playing">
    </div>
    <div class="flex bg-pink-400 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    HEALTH
                </span>

            <h3 class="text-xl font-bold py-10">
                Understanding Your Dog's Nutritional Needs - Learn how to provide balanced meals that keep your dog healthy and happy throughout all stages of life.
            </h3>

            <a
                href="/blog"
                class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-gray-100 hover:text-pink-300 transition duration-300">
                Read Full Article
            </a>
        </div>
    </div>
</div>
@endsection
