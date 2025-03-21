@extends('layouts.app')

@section('content')
<main class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-15">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">{{ __('Register') }}</h1>
            <p class="text-sm text-gray-600 mt-3 mb-5">{{ __('Create an account to get started') }}</p>
        </header>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="space-y-6">
                <!-- Name Field -->
                <div class="flex flex-col">
                    <label for="name" class="text-lg text-gray-700">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('name')
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="flex flex-col">
                    <label for="email" class="text-lg text-gray-700">{{ __('E-mail Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('email')
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="flex flex-col">
                    <label for="password" class="text-lg text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('password')
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="flex flex-col">
                    <label for="password-confirm" class="text-lg text-gray-700">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="mt-2 mb-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                </div>

                <!-- Register Button -->
                <button type="submit" class="w-full mt-8 py-3 bg-blue-500 text-white text-lg font-semibold rounded-md hover:bg-blue-600 transition duration-300">
                    {{ __('Register') }}
                </button>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600">
                    {{ __("Already have an account?") }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">{{ __('Login') }}</a>
                </p>
            </div>
        </form>
    </div>
</main>
@endsection
