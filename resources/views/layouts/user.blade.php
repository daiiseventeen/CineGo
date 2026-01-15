<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-black text-white px-6 py-4 flex justify-between">
        <h1 class="font-bold text-xl">🎬 CINEGO</h1>
        <div>
            <a href="#" class="mr-4">Film</a>
            <a href="#" class="mr-4">Tiket Saya</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
        </div>
    </nav>

    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    {{-- Content --}}
    <main class="p-6">
        @yield('content')
    </main>

    </body>
</html>
