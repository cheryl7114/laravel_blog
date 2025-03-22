@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-10">
        @include('layouts.back')
        <h1 class="text-4xl font-bold text-gray-900">
            {{ $post->title }}
        </h1>
        <span class="text-gray-500 block text-lg text-right mt-5">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->created_at)) }}
        </span>
    </div>
</div>

<!-- Grid layout for Image and Content -->
<div class="w-4/5 m-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <!-- Post Image on the Left -->
    <div class="overflow-hidden rounded-lg">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image" class="w-full h-auto object-cover rounded-lg shadow-lg">
    </div>

    <!-- Post Content on the Right -->
    <div>
        <p class="text-xl text-justify text-gray-700 leading-8 font-light">
            {{ $post->description }}
        </p>
        <!-- Like/Unlike Button -->
        <div class="flex items-center space-x-3 mt-8">
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

        <!-- Comments Section -->
        <div>
            <!-- Comment Form -->
            <div class="mt-8">
                @auth
                <form action="{{ route('comment.store', $post->slug) }}" method="POST" class="flex items-center ">
                    @csrf
                    <input type="text" name="content" class="w-full p-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500" placeholder="Write a comment..." required>
                    <button type="submit" class="px-6 py-3 ml-5 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none">
                        Post
                    </button>
                </form>
                @else
                <div class="flex items-center space-x-4">
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500" placeholder="Write a comment..." id="guestCommentInput">
                    <button type="button" id="openCommentLoginModal" class="px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none">
                        Post
                    </button>
                </div>
                @endauth
            </div>

            <!-- Display existing comments -->
            <div class="space-y-6 mt-6">
                @foreach($post->comments->sortByDesc('created_at') as $comment)
                <div class="flex items-start space-x-4">
                    <!-- Profile Picture -->
                    <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full border-2 border-gray-300" src="{{ $comment->user->avatar_url ?? 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y' }}" alt="{{ $comment->user->name }}">
                    </div>

                    <!-- Comment Content -->
                    <div>
                        <div class="flex items-start space-x-2">
                            <!-- Username and Comment -->
                            <p class="text-gray-600 text-sm leading-relaxed"><span class="font-semibold mr-2">{{ $comment->user->name }}</span>{{ $comment->content }}</p>
                        </div>
                        <!-- Time Posted and Delete Button -->
                        <div class="flex items-center mt-2">
                            <p class="text-gray-400 text-xs">{{ $comment->created_at->diffForHumans() }}</p>

                            <!-- Only show delete button if the comment belongs to the user -->
                            @if(auth()->check() && auth()->user()->id == $comment->user_id)
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="openDeleteModal text-red-500 text-xs ml-4" data-form-action="{{ route('comment.destroy', $comment->id) }}">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="leading-normal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8">Login Required</h3>
            <p class="text-gray-600 mb-8">You need to be logged in to interact with posts.</p>
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

<!-- Comment Deletion Confirmation Modal -->
<div id="commentDeleteModal" class="leading-normal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-800 mb-8">Confirm Deletion</h3>
            <p class="text-gray-600 mb-8">Are you sure you want to delete this comment? This action cannot be undone.</p>
        </div>
        <div class="flex justify-center space-x-4">
            <button type="button" id="confirmDelete" class="px-6 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600 transition duration-300">
                Delete
            </button>
            <button id="closeDeleteModal" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 transition duration-300">
                Cancel
            </button>
        </div>
        <form id="deleteCommentForm" action="" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openLoginModal');
        const openCommentModalBtn = document.getElementById('openCommentLoginModal');
        const closeModalBtn = document.getElementById('closeLoginModal');
        const loginModal = document.getElementById('loginModal');

        const openDeleteModalBtns = document.querySelectorAll('.openDeleteModal');
        const closeDeleteModalBtn = document.getElementById('closeDeleteModal');
        const deleteModal = document.getElementById('commentDeleteModal');
        const deleteCommentForm = document.getElementById('deleteCommentForm');
        const confirmDeleteBtn = document.getElementById('confirmDelete');

        // Function to show the login modal
        const showLoginModal = function() {
            loginModal.classList.remove('hidden');
        };

        // Function to hide the login modal
        const hideLoginModal = function() {
            loginModal.classList.add('hidden');
        };

        // Function to show the delete comment modal
        const showDeleteModal = function(event) {
            const formAction = event.target.getAttribute('data-form-action');
            deleteCommentForm.action = formAction;
            deleteModal.classList.remove('hidden');
        };

        // Function to hide the delete comment modal
        const hideDeleteModal = function() {
            deleteModal.classList.add('hidden');
        };

        // When confirmDelete button is clicked, submit the form
        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function() {
                deleteCommentForm.submit();
            });
        }

        // Open login modal
        if (openModalBtn) {
            openModalBtn.addEventListener('click', showLoginModal);
        }

        // Open comment modal
        if (openCommentModalBtn) {
            openCommentModalBtn.addEventListener('click', showLoginModal);
        }

        // Close login modal
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', hideLoginModal);
        }

        // Open delete modal when clicking delete button
        openDeleteModalBtns.forEach(function(btn) {
            btn.addEventListener('click', showDeleteModal);
        });

        // Close delete modal
        if (closeDeleteModalBtn) {
            closeDeleteModalBtn.addEventListener('click', hideDeleteModal);
        }

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target === loginModal) {
                hideLoginModal();
            }

            if (event.target === deleteModal) {
                hideDeleteModal();
            }
        });
    });
</script>

@endsection
