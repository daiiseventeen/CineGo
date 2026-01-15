<!DOCTYPE html>
<html>
<head>
    <title>CINEGO Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-black text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Admin CINEGO</h2>
        <ul>
            <li class="mb-3"><a href="#">Dashboard</a></li>
            <li class="mb-3"><a href="#">Film</a></li>
            <li class="mb-3"><a href="#">Jadwal</a></li>
            <li class="mb-3"><a href="#">Transaksi</a></li>
        </ul>
    </aside>

    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    {{-- Content --}}
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
