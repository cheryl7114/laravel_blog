@extends('layouts.app')

@section('content')
<div class="py-16 ">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 drop-shadow-lg">About Pulabo</h1>
        <p class="text-xl text-gray-600 mt-6 leading-loose italic">
            Welcome to <span class="font-bold text-pink-500">Pulabo</span>, a personal blog where I share my journey with dogs! 🐶💖
        </p>
        <p class="mt-8 text-gray-700 text-lg leading-loose">
            Pulabo is my little corner of the internet, dedicated to my love for dogs. Whether I’m sharing training tips, heartwarming stories, or dog-friendly adventures, this blog is all about the joys (and occasional chaos) of life with dogs.
        </p>
        <p class="mt-8 text-gray-700 text-lg leading-loose">
            You're probably wondering where "Pulabo" came from - well, it's the combination of the names of own furry buddies: Pudding, Latte, and Boba 🐶💖
        </p>
    </div>

    <div class="max-w-5xl mx-auto mt-16 px-6">
        <div class="grid sm:grid-cols-2 gap-12">
            <div class="bg-white p-8 shadow-xl rounded-lg text-center transform hover:-translate-y-1 transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-800">My Story</h3>
                <p class="text-gray-600 mt-4 text-lg leading-loose text-justify">
                    Pulabo started as a passion project—just me and my love for dogs. I wanted a space to document my experiences, from training mishaps to heartwarming moments with my furry best friends.
                </p>

            </div>
            <div class="bg-white p-8 shadow-xl rounded-lg text-center transform hover:-translate-y-1 transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-800">Why I Blog</h3>
                <p class="text-gray-600 mt-4 text-lg leading-loose text-justify">
                    This blog is a collection of everything I’ve learned (and continue to learn) about raising, training, and loving dogs. I hope to connect with other dog lovers and share experiences that make life with our furry friends even better.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-b from-blue-100 to-blue-300 mt-36 mb-36 py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 drop-shadow-md">Some Fun Facts 🐕</h2>
            <p class="text-gray-700 mt-4 text-lg leading-relaxed">
                Here are some fun things about me and my dog-loving life!
            </p>
            <div class="grid sm:grid-cols-3 gap-8 mt-12">
                <div class="bg-white p-8 shadow-xl rounded-xl text-center transform hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-2xl font-bold text-pink-500">🐶 Favorite Dog Breed</h3>
                    <p class="text-gray-600 mt-4 text-lg">Golden Retriever (but I love all dogs!)</p>
                </div>
                <div class="bg-white p-8 shadow-xl rounded-xl text-center transform hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-2xl font-bold text-pink-500">🌎 Dream Dog Travel</h3>
                    <p class="text-gray-600 mt-4 text-lg">Visiting dog cafés around the world</p>
                </div>
                <div class="bg-white p-8 shadow-xl rounded-xl text-center transform hover:-translate-y-2 transition-all duration-300">
                    <h3 class="text-2xl font-bold text-pink-500">📸 Most Snapped Photo</h3>
                    <p class="text-gray-600 mt-4 text-lg">My dog sleeping in funny positions</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto mt-16 px-6 text-center">
        <h2 class="text-4xl font-extrabold text-gray-800 drop-shadow-md">Meet The Gang! 🐕</h2>
        <p class="text-gray-700 mt-4 text-lg leading-relaxed mb-12">
            As much as I love all dogs, these 3 will always be my favourite <3
        </p>
        <div class="grid sm:grid-cols-3 gap-12">
            <div class="bg-white p-8 shadow-xl rounded-lg text-center transform hover:-translate-y-1 transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-800">Pudding</h3>
                <div class="mt-4">
                    <img src="{{ asset('images/pudding.JPG') }}" class="rounded-lg w-full h-96 object-cover" alt="Dog journey">
                </div>
            </div>
            <div class="bg-white p-8 shadow-xl rounded-lg text-center transform hover:-translate-y-1 transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-800">Latte</h3>
                <div class="mt-4">
                    <img src="{{ asset('images/latte.png') }}" class="rounded-lg w-full h-96 object-cover" alt="Dog journey">
                </div>
            </div>
            <div class="bg-white p-8 shadow-xl rounded-lg text-center transform hover:-translate-y-1 transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-800">Boba</h3>
                <div class="mt-4">
                    <img src="{{ asset('images/boba.png') }}" class="rounded-lg w-full h-96 object-cover" alt="Dog journey">
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-32">
        <a href="/blog" class="bg-pink-500 text-white py-4 px-8 rounded-full text-xl font-bold shadow-lg hover:bg-pink-600 transition duration-300">
            Explore My Blog
        </a>
    </div>
</div>
@endsection
