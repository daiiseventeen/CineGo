<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CINEGO') }} - Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}" media="all" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #333;
            min-height: 100vh;
        }

        .user-container {
            display: flex;
            min-height: 100vh;
        }

        /* Top Navbar */
        .user-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 900;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: bold;
            color: #ff6b6b;
            text-decoration: none;
        }

        .navbar-logo i {
            font-size: 28px;
        }

        .navbar-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .navbar-menu a {
            color: #666;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .navbar-menu a:hover {
            color: #ff6b6b;
        }

        .navbar-menu a.active {
            color: #ff6b6b;
            border-bottom: 2px solid #ff6b6b;
            padding-bottom: 3px;
        }

        .navbar-logout {
            padding: 8px 16px;
            background-color: #ff6b6b;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        .navbar-logout:hover {
            background-color: #ff5252;
            transform: translateY(-2px);
        }

        /* Sidebar */
        .user-sidebar {
            width: 260px;
            background: white;
            padding: 100px 20px 30px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
        }

        .sidebar-section {
            margin-bottom: 30px;
        }

        .sidebar-title {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            font-weight: bold;
            padding: 10px 0;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #666;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
            padding-left: 20px;
        }

        .sidebar-menu i {
            font-size: 18px;
            width: 20px;
        }

        .sidebar-user-card {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }

        .user-avatar-large {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0 auto 12px;
            color: white;
        }

        .sidebar-user-card strong {
            display: block;
            margin-bottom: 5px;
        }

        .sidebar-user-card small {
            font-size: 12px;
            opacity: 0.9;
        }

        /* Main Content */
        .user-content {
            margin-left: 260px;
            margin-top: 70px;
            flex: 1;
            padding: 30px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: calc(100vh - 70px);
        }

        /* Header Section */
        .content-header {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-header h1 {
            font-size: 28px;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .content-header h1 i {
            color: #ff6b6b;
            font-size: 32px;
        }

        .header-stats {
            display: flex;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item strong {
            display: block;
            font-size: 24px;
            color: #ff6b6b;
        }

        .stat-item span {
            display: block;
            font-size: 12px;
            color: #999;
            margin-top: 5px;
            text-transform: uppercase;
        }

        /* Content Sections */
        .section-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ff6b6b;
        }

        .section-title i {
            color: #ff6b6b;
            font-size: 26px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .user-sidebar {
                width: 200px;
            }

            .user-content {
                margin-left: 200px;
            }
        }

        @media (max-width: 768px) {
            .user-navbar {
                flex-direction: column;
                gap: 15px;
                padding: 15px;
            }

            .navbar-menu {
                width: 100%;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .user-sidebar {
                width: 100%;
                position: relative;
                padding: 20px;
                margin-top: 0;
                height: auto;
            }

            .user-content {
                margin-left: 0;
                margin-top: 0;
                padding: 15px;
            }

            .content-header {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .header-stats {
                width: 100%;
                justify-content: space-around;
            }
        }

        @media (max-width: 576px) {
            .user-navbar {
                padding: 10px 15px;
            }

            .navbar-logo {
                font-size: 18px;
            }

            .navbar-menu {
                gap: 10px;
                font-size: 12px;
            }

            .content-header h1 {
                font-size: 20px;
            }

            .section-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="user-container">
        <!-- Top Navbar -->
        <nav class="user-navbar">
            <a href="{{ route('home') }}" class="navbar-logo">
                <i class="icofont icofont-film"></i>
                CINEGO
            </a>
            <div class="navbar-menu">
                <a href="{{ route('home') }}" class="active">
                    <i class="icofont icofont-home"></i> Home
                </a>
                <a href="{{ route('welcome') }}">
                    <i class="icofont icofont-film"></i> Jelajahi Film
                </a>
                <a href="#">
                    <i class="icofont icofont-ticket"></i> Tiket Saya
                </a>
                <a href="#">
                    <i class="icofont icofont-user"></i> Profil
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="navbar-logout">
                        <i class="icofont icofont-logout"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="user-sidebar">
            <!-- User Card -->
            <div class="sidebar-user-card">
                <div class="user-avatar-large">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <strong>{{ Auth::user()->name }}</strong>
                <small>{{ Auth::user()->email }}</small>
            </div>

            <!-- Main Menu -->
            <div class="sidebar-section">
                <div class="sidebar-title">Menu</div>
                <ul class="sidebar-menu">
                    <li><a href="{{ route('home') }}" class="active"><i class="icofont icofont-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('welcome') }}"><i class="icofont icofont-film"></i> Jelajahi Film</a></li>
                    <li><a href="#"><i class="icofont icofont-ticket"></i> Pemesanan Saya</a></li>
                    <li><a href="#"><i class="icofont icofont-heart"></i> Favorit</a></li>
                </ul>
            </div>

            <!-- Account Menu -->
            <div class="sidebar-section">
                <div class="sidebar-title">Akun</div>
                <ul class="sidebar-menu">
                    <li><a href="{{ route('profile.edit') }}"><i class="icofont icofont-user"></i> Edit Profil</a></li>
                    <li><a href="#"><i class="icofont icofont-settings"></i> Pengaturan</a></li>
                    <li><a href="#"><i class="icofont icofont-question"></i> Bantuan</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="user-content">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
</body>
</html>
