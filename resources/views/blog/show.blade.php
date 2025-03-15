@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>

    <div class="flex items-center space-x-2">
        <!-- Like/Unlike Button -->
        <form action="{{ $post->likes->where('user_id', auth()->user()->id)->count() > 0 ? route('like.destroy', $post->slug) : route('like.store', $post->slug) }}" method="POST">
            @csrf
            @if($post->likes->where('user_id', auth()->user()->id)->count() > 0)
            @method('DELETE') <!-- This is for "Unlike" action -->
            @endif
            <button type="submit" class="text-2xl" style="background: none; border: none; cursor: pointer;">
                @if ($post->likes->where('user_id', auth()->user()->id)->count() > 0)
                <!-- Filled Heart (Red) if liked -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                @else
                <!-- Empty Heart (Gray) if not liked -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="gray" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                @endif
            </button>
        </form>

        <!-- Display Like Count -->
        <span class="text-lg font-semibold">
        {{ $post->likes->count() }}
        </span>
    </div>
</div>

@endsection
