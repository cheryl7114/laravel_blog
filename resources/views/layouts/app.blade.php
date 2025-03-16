<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pulabo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-pink-50 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-purple-300 py-8">
            <div class="flex justify-between items-center px-10">
                <div>
                    <a href="{{ url('/') }}" class="text-3xl font-semibold text-gray-700 no-underline flex items-center gap-2">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.87">
                            <path fill="white" d="M16.69,101.1l-0.22-0.02c-4.9-0.42-9.18-2.78-12.14-6.24c-2.97-3.48-4.63-8.07-4.27-12.97
                    c0-0.08,0.01-0.18,0.02-0.26c0.42-4.9,2.78-9.18,6.24-12.14c3.51-3,8.15-4.66,13.1-4.27l11.88,0.96
                    c11.62-11.62,23.23-23.24,34.85-34.86l-0.96-11.88c-0.38-4.96,1.27-9.6,4.27-13.1c3-3.5,7.33-5.87,12.27-6.25
                    c4.96-0.38,9.6,1.27,13.1,4.27c3.5,3,5.87,7.33,6.25,12.27l0.43,5.33l2.85-0.1l0-0.01h0.14c4.88-0.1,9.34,1.73,12.66,4.82
                    c3.36,3.14,5.53,7.55,5.7,12.51v0.09h0.01v0.14c0.12,4.88-1.73,9.34-4.82,12.66c-3.14,3.36-7.55,5.53-12.52,5.7l-15.46,0.58
                    C79.47,68.91,68.91,79.49,58.3,90.09l-0.58,15.46c-0.18,4.96-2.34,9.38-5.7,12.51c-3.36,3.13-7.92,4.98-12.88,4.81
                    c-4.96-0.18-9.38-2.34-12.51-5.7c-3.13-3.36-4.98-7.92-4.81-12.88l0.1-2.75L16.69,101.1L16.69,101.1L16.69,101.1z"/>
                        </svg>
                        Pulabo
                    </a>
                </div>
                <nav class="space-x-4 text-gray-600 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/blog">Blog</a>
                    @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    <span>{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
