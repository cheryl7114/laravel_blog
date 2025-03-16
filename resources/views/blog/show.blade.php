@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-4xl font-bold text-gray-900">
            {{ $post->title }}
        </h1>
        <span class="text-gray-500 block text-lg mt-5">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>
    </div>
</div>
<div class="w-4/5 m-auto">
    <!-- Post Image -->
    <div class="overflow-hidden rounded-lg">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image" class="w-full h-96 object-cover transition duration-300 transform hover:scale-105">
    </div>
    <!-- Post Description -->
    <p class="text-xl text-justify text-gray-700 pt-10 pb-12 leading-8 font-light">
        {{ $post->description }}
    </p>
    <!-- Like/Unlike Button -->
    <div class="flex items-center space-x-3">
        @auth
        <form action="{{ $post->likes->where('user_id', auth()->user()->id)->count() > 0 ? route('like.destroy', $post->slug) : route('like.store', $post->slug) }}" method="POST">
            @csrf
            @if($post->likes->where('user_id', auth()->user()->id)->count() > 0)
            @method('DELETE') <!-- Unlike action -->
            @endif
            <button type="submit" class="text-2xl bg-transparent border-none cursor-pointer">
                @if ($post->likes->where('user_id', auth()->user()->id)->count() > 0)
                <!-- Filled Heart (Red) if liked -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="red" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                @else
                <!-- Empty Heart (Gray) if not liked -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="gray" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                @endif
            </button>
        </form>
        @else
        <button type="button" id="openLoginModal" class="text-2xl bg-transparent border-none cursor-pointer">
            <!-- Empty Heart (Gray) for guests -->
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="gray" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        </button>
        @endauth

        <!-- Display Like Count -->
        <span class="text-lg font-semibold text-gray-800">
            {{ $post->likes->count() }} Likes
        </span>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8">Login Required</h3>
            <p class="text-gray-600 mb-8">You need to be logged in to like posts.</p>
        </div>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 transition duration-300">
                Proceed to Login
            </a>
            <button id="closeLoginModal" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 transition duration-300">
                Cancel
            </button>
        </div>
    </div>
</div>

<script>
    // Modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openLoginModal');
        const closeModalBtn = document.getElementById('closeLoginModal');
        const modal = document.getElementById('loginModal');

        if (openModalBtn) {
            openModalBtn.addEventListener('click', function() {
                modal.classList.remove('hidden');
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
        }

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
@endsection
