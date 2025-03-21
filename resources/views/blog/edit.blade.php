@extends('layouts.app')

@section('content')
<div class="w-4/5 md:w-3/5 mx-auto text-left py-10">
    <h1 class="text-4xl font-bold text-gray-800 mt-8 mb-12">
        Update Post
    </h1>

    @if ($errors->any())
    <div class="w-full bg-red-500 text-white rounded-lg p-4 mb-6">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/blog/{{ $post->slug }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div class="mb-6 mt-5">
            <label for="title" class="block text-lg font-medium text-gray-700 mb-5">Post Title</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ $post->title }}"
                class="block w-full px-4 py-3 text-xl bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
        </div>

        <!-- Description Textarea -->
        <div class="mb-6 mt-10">
            <label for="description" class="block text-lg font-medium text-gray-700 mb-5">Description</label>
            <textarea
                name="description"
                id="description"
                class="block w-full px-4 py-3 text-xl bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 h-52">{{ $post->description }}</textarea>
        </div>

        <!-- Current Image Display (No Change Allowed) -->
        <div class="mb-15 mt-10">
            <label class="block text-lg font-medium text-gray-700 mb-5">Current Image</label>
            <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image" class="w-40 h-40 object-cover rounded-lg shadow-md">
            <p class="text-gray-500 mt-5">You cannot change the image for this post.</p>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-6 mb-10">
            <!-- Cancel Button -->
            <a href="/blog" class="w-1/3 text-center bg-gray-400 text-white text-xl py-3 rounded-lg shadow-lg hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-300">
                Cancel
            </a>

            <!-- Submit Button -->
            <button type="submit" class="w-1/3 bg-blue-500 text-white text-xl py-3 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                Update Post
            </button>
        </div>

    </form>
</div>
@endsection
