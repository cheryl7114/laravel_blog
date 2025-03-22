@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto">
    <div class="flex items-center py-15 border-b border-gray-300">
        <h1 class="text-4xl font-extrabold text-gray-800 mr-4">
            Blog Posts
        </h1>

        <!-- Add Post Icon -->
        @if (Auth::check() && Auth::user()->is_admin == 1)
        <a href="/blog/create" class="text-blue-400 hover:text-blue-700 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 -1 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="16" />
                <line x1="8" y1="12" x2="16" y2="12" />
            </svg>
        </a>
        @endif
    </div>
</div>

<!-- Search Bar -->
<div class="w-4/5 m-auto mt-15">
    <input type="text" id="searchInput" placeholder="Search blog posts..." class="w-full p-3 border border-gray-300 rounded-md" onkeyup="searchPosts()" />
</div>

<!-- No results message -->
<div id="noResultsMessage" class="w-4/5 m-auto mt-15 text-center text-xl text-gray-500 hidden">
    No matching results
</div>

@if (session()->has('message'))
<div class="w-4/5 m-auto mt-15">
    <div class="bg-green-500 text-white rounded-lg shadow-lg p-4 flex items-center justify-between">
        <p class="text-lg font-semibold">
            {{ session()->get('message') }}
        </p>
        <button
            onclick="this.parentElement.style.display='none';"
            class="ml-4 bg-transparent text-white hover:text-gray-300 transition duration-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-md w-full">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Are you sure you want to delete this post?</h2>
            <p class="text-gray-600 mb-6">This action cannot be undone.</p>
        </div>
        <div class="flex justify-center space-x-4">
            <!-- Cancel Button -->
            <button onclick="closeModal()" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 transition duration-300">
                Cancel
            </button>
            <!-- Confirm Delete Button -->
            <button id="confirmDeleteBtn" class="px-6 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-700 transition duration-300">
                Delete
            </button>
        </div>
    </div>
</div>

<!-- Blog Post Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-20 w-4/5 mx-auto mt-15">
    @foreach ($posts as $post)
    <div class="bg-red-200 shadow-lg rounded-lg p-15 post cursor-pointer" data-title="{{ $post->title }}">
        <div class="overflow-hidden rounded-lg" onclick="window.location.href='/blog/{{ $post->slug }}'">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image" class="w-full h-80 object-cover transition duration-300 transform hover:scale-110">
        </div>
        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
        <div class="mt-10 flex justify-end space-x-4">
            <!-- Edit Button -->
            <a href="/blog/{{ $post->slug }}/edit" class="text-gray-500 hover:text-blue-500 transition duration-300" onclick="event.stopPropagation();">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4z"></path>
                </svg>
            </a>

            <!-- Delete Button with Modal Trigger -->
            <button onclick="event.stopPropagation(); openModal('{{ $post->slug }}')" class="text-red-500 hover:text-red-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6l-2 14H7L5 6"></path>
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                    <path d="M9 6V3h6v3"></path>
                </svg>
            </button>

            <!-- Hidden Delete Form -->
            <form id="deleteForm" action="" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
        @endif
        <div onclick="window.location.href='/blog/{{ $post->slug }}'">
            <h2 class="text-3xl font-semibold text-gray-800 hover:text-blue-500 transition duration-300 mb-4 mt-8">
                {{ $post->title }}
            </h2>

            <p class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span> | Created on {{ date('jS M Y', strtotime($post->created_at)) }}
            </p>

            <p class="text-lg text-gray-700 pt-8 pb-10 leading-8 font-light text-justify">
                {{ Str::limit($post->description, 180) }}
            </p>

            <div class="flex items-center space-x-6">
                <div class="flex items-center text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="26" height="26" fill="none" stroke="red" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="text-lg font-semibold">{{ $post->likes->count() }}</span>
                </div>

                <div class="flex items-center text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="text-lg font-semibold">{{ $post->comments->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    // Delete confirmation modal
    let deleteSlug = ""

    function openModal(slug) {
        deleteSlug = slug
        document.getElementById("deleteModal").classList.remove("hidden")
    }

    function closeModal() {
        document.getElementById("deleteModal").classList.add("hidden")
    }

    document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
        let form = document.getElementById("deleteForm")
        form.action = "/blog/" + deleteSlug
        form.submit()
    })

    // Function to search posts based on title
    function searchPosts() {
        var input, filter, posts, postTitle, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        posts = document.getElementsByClassName('post');
        var noResultsMessage = document.getElementById('noResultsMessage');
        var visiblePosts = 0;

        for (i = 0; i < posts.length; i++) {
            postTitle = posts[i].getAttribute("data-title");
            txtValue = postTitle ? postTitle.toUpperCase() : '';
            if (txtValue.indexOf(filter) > -1) {
                posts[i].style.display = "";
                visiblePosts++;
            } else {
                posts[i].style.display = "none";
            }
        }

        // Show "No matching results" if no posts are visible
        if (visiblePosts === 0) {
            noResultsMessage.classList.remove('hidden');
        } else {
            noResultsMessage.classList.add('hidden');
        }
    }
</script>

@endsection
