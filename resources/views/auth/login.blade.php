@extends('layouts.app')

@section('content')
<main class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-15">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">{{ __('Login') }}</h1>
            <p class="text-sm text-gray-600 mt-3 mb-5">{{ __('Enter your credentials to continue') }}</p>
        </header>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-6">
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
                    <input id="password" type="password" name="password" required class="mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    @error('password')
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center text-gray-700">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-sm">{{ __('Remember Me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:text-blue-700">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full mt-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-md hover:bg-blue-600 transition duration-300">
                    {{ __('Login') }}
                </button>

                <!-- Register Link -->
                @if (Route::has('register'))
                <p class="mt-4 text-center text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">{{ __('Register') }}</a>
                </p>
                @endif
            </div>
        </form>
    </div>
</main>
@endsection
