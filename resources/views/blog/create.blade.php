@extends('layouts.app')

@section('content')
<div class="w-4/5 md:w-3/5 mx-auto text-left py-10">
    @include('layouts.back')
    <h1 class="text-4xl font-bold text-gray-800 mb-8">
        Create Post
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

    <form action="/blog" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <!-- Title Input -->
        <div class="mb-6 mt-5">
            <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Post Title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Enter your post title"
                class="block w-full px-4 py-3 text-xl bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
        </div>

        <!-- Description Textarea -->
        <div class="mb-6 mt-10">
            <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
            <textarea
                name="description"
                id="description"
                placeholder="Enter post description..."
                class="block w-full px-4 py-3 text-xl bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 h-52"></textarea>
        </div>

        <!-- Image Upload with Preview -->
        <div class="mb-6 mt-10">
            <label class="block text-lg font-medium text-gray-700 mb-2">Upload an Image</label>
            <div class="relative">
                <input
                    type="file"
                    name="image"
                    id="image-upload"
                    class="hidden"
                    onchange="previewImage(event)">
                <label for="image-upload" class="block w-full cursor-pointer bg-gray-100 text-lg font-medium text-gray-700 py-3 px-6 rounded-lg shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Choose an image
                </label>
                <div id="image-preview" class="mt-4 hidden">
                    <img id="image-preview-img" src="#" alt="Image Preview" class="w-40 h-40 object-cover rounded-lg shadow-md">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white text-xl py-3 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 mt-5 mb-5">
            Submit Post
        </button>
    </form>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const image = document.getElementById('image-preview-img');
            image.src = e.target.result;
            preview.classList.remove('hidden');
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
