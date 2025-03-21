@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <div class="text-center">
        <img src="https://cdn.pixabay.com/photo/2017/09/25/13/12/dog-2785074_960_720.jpg"
             alt="Lost Dog" class="w-64 h-auto mx-auto">
        <h1 class="text-5xl font-bold text-gray-800 mt-6">Oops! Page Not Found</h1>
        <p class="text-gray-600 mt-4 text-lg">
            Looks like your dog ran away with this page! 🐶
        </p>
        <a href="{{ url('/') }}"
           class="mt-6 inline-block bg-blue-500 text-white py-3 px-6 font-bold text-lg uppercase rounded">
            Go Home
        </a>
    </div>
</div>
@endsection
