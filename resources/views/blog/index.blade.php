@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto">
    <div class="flex items-center py-15 border-b border-gray-300">
        <h1 class="text-4xl font-extrabold text-gray-800 mr-4">
            Blog Posts
        </h1>

        <!-- Add Post Icon -->
        @if (Auth::check())
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

@if (session()->has('message'))
<div class="w-4/5 m-auto mt-15 pl-2">
    <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
        {{ session()->get('message') }}
    </p>
</div>
@endif

@foreach ($posts as $post)
<div class="sm:grid grid-cols-1 lg:grid-cols-2 gap-20 w-4/5 mx-auto bg-red-200 shadow-lg rounded-lg mt-15 transition-all duration-300 hover:shadow-xl hover:scale-105 p-15">
    <div class="overflow-hidden rounded-lg">
        <img src="{{ asset('images/' . $post->image_path) }}" alt="Post Image" class="w-full h-80 object-cover transition duration-300 transform hover:scale-110">
    </div>
    <div class="">
        <h2 class="text-3xl font-semibold text-gray-800 hover:text-blue-500 transition duration-300 mb-4">
            {{ $post->title }}
        </h2>
        <p class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span> | Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </p>

        <p class="text-lg text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ Str::limit($post->description, 150) }}
        </p>

        <a href="/blog/{{ $post->slug }}" class="inline-block bg-blue-500 text-white text-lg font-extrabold py-4 px-8 rounded-3xl transition duration-300 transform hover:bg-blue-600 hover:scale-105">
            Keep Reading
        </a>

        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
        <div class="mt-4 flex justify-end space-x-4">
            <a href="/blog/{{ $post->slug }}/edit" class="text-gray-700 italic hover:text-blue-500 transition duration-300">
                Edit
            </a>

            <form action="/blog/{{ $post->slug }}" method="POST">
                @csrf
                @method('delete')
                <button class="text-red-500 hover:text-red-700 transition duration-300">
                    Delete
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endforeach

@endsection
