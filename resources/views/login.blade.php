<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-900 dark:bg-gray-900 sm:items-center sm:pt-0">

            <div class="max-w-6xl bg-gray-700  mx-auto shadow-inner">
                <div class="flex justify-center p-4">
                    <p class="text-sm text-white">Login to Access the Web</p>
                </div>
                <div class="flex justify-center p-2">
                    @if (Route::has('login'))
                    <div class="bg-blue-900 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>
    </body>
</html>
