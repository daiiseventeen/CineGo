<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEGO - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}" media="all" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #ef4444;
            --dark-bg: #0a0a0a;
            --dark-card: #1a1a1a;
            --border-color: rgba(255, 255, 255, 0.08);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.6);
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            opacity: 0.4;
        }

        .bg-animation::before,
        .bg-animation::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 20s infinite ease-in-out;
        }

        .bg-animation::before {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.15) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .bg-animation::after {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.1) 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(100px, 100px); }
            50% { transform: translate(-50px, 150px); }
            75% { transform: translate(150px, -50px); }
        }

        /* ============================================
           SIDEBAR STYLES
           ============================================ */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #0d0d0d 0%, #1a0a0a 100%);
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Sidebar Glow Effect */
        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, 
                transparent 0%, 
                var(--primary-red) 20%,
                var(--primary-red) 80%,
                transparent 100%);
            opacity: 0.3;
            animation: glow 3s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        /* Logo Section */
        .sidebar-logo {
            padding: 30px 25px;
            border-bottom: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .sidebar-logo::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%,
                var(--primary-red) 50%,
                transparent 100%);
            animation: scan 3s linear infinite;
        }

        @keyframes scan {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .logo-content {
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #dc2626 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 12px 35px rgba(239, 68, 68, 0.6); }
        }

        .logo-text h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: 900;
            margin: 0;
            background: linear-gradient(135deg, #fff 0%, var(--primary-red) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 3px;
        }

        .logo-text p {
            font-size: 10px;
            color: var(--text-secondary);
            margin: 2px 0 0 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }

        /* Sidebar Menu */
        .sidebar-menu {
            list-style: none;
            padding: 25px 15px;
            flex: 1;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--primary-red) transparent;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: var(--primary-red);
            border-radius: 10px;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-menu a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: var(--primary-red);
            transform: scaleY(0);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-menu a::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                rgba(239, 68, 68, 0.1) 0%,
                transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: var(--text-primary);
            background: rgba(239, 68, 68, 0.08);
            transform: translateX(5px);
        }

        .sidebar-menu a:hover::before,
        .sidebar-menu a.active::before {
            transform: scaleY(1);
        }

        .sidebar-menu a:hover::after,
        .sidebar-menu a.active::after {
            opacity: 1;
        }

        .sidebar-menu a i {
            font-size: 20px;
            width: 25px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .sidebar-menu a:hover i,
        .sidebar-menu a.active i {
            color: var(--primary-red);
            transform: scale(1.1);
        }

        .sidebar-menu a span {
            position: relative;
            z-index: 1;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 20px 15px 25px;
            border-top: 1px solid var(--border-color);
        }

        .user-profile-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .user-profile-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .profile-avatar {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #dc2626 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .profile-role {
            font-size: 11px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .logout-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #dc2626 100%);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
            position: relative;
            overflow: hidden;
        }

        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .logout-btn:hover::before {
            left: 100%;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(239, 68, 68, 0.5);
        }

        .logout-btn i {
            font-size: 18px;
        }

        /* ============================================
           MAIN CONTENT & TOPBAR
           ============================================ */
        .admin-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        /* Topbar */
        .admin-topbar {
            background: rgba(26, 26, 26, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 40px;
            position: sticky;
            top: 0;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        .page-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 28px;
            color: var(--text-primary);
            margin: 0;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title i {
            color: var(--primary-red);
            font-size: 32px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .breadcrumb a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: var(--primary-red);
        }

        .breadcrumb span {
            color: var(--text-secondary);
        }

        /* Topbar Right */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Search Bar */
        .topbar-search {
            position: relative;
            display: flex;
            align-items: center;
        }

        .topbar-search input {
            width: 300px;
            padding: 12px 20px 12px 45px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .topbar-search input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.5);
            width: 350px;
        }

        .topbar-search input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .topbar-search i {
            position: absolute;
            left: 16px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 18px;
        }

        /* Notification Bell */
        .notification-btn {
            position: relative;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .notification-btn i {
            font-size: 20px;
            color: var(--text-secondary);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: var(--primary-red);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            color: white;
            border: 2px solid var(--dark-card);
        }

        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .user-menu-avatar {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary-red) 0%, #dc2626 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 16px;
            color: white;
        }

        .user-menu-info {
            display: flex;
            flex-direction: column;
        }

        .user-menu-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .user-menu-role {
            font-size: 11px;
            color: var(--text-secondary);
        }

        .user-menu i {
            color: var(--text-secondary);
            font-size: 12px;
            margin-left: 5px;
        }

        /* Content Area */
        .content-area {
            padding: 30px 40px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .topbar-search input {
                width: 200px;
            }
            
            .topbar-search input:focus {
                width: 250px;
            }
        }

        @media (max-width: 992px) {
            :root {
                --sidebar-width: 70px;
            }

            .admin-sidebar {
                width: var(--sidebar-width);
            }

            .logo-text,
            .sidebar-menu a span,
            .user-profile-card,
            .logout-btn span {
                display: none;
            }

            .sidebar-logo {
                padding: 20px 10px;
                justify-content: center;
            }

            .logo-content {
                justify-content: center;
            }

            .sidebar-menu a {
                justify-content: center;
                padding: 15px;
            }

            .sidebar-menu a i {
                margin: 0;
            }

            .logout-btn {
                padding: 14px 0;
            }

            .admin-content {
                margin-left: 70px;
            }
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .admin-sidebar.active {
                transform: translateX(0);
            }

            .admin-content {
                margin-left: 0;
            }

            .admin-topbar {
                padding: 15px 20px;
            }

            .page-title {
                font-size: 22px;
            }

            .topbar-search {
                display: none;
            }

            .content-area {
                padding: 20px;
            }

            .user-menu-info {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .breadcrumb {
                display: none;
            }

            .notification-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Background Animation -->
    <div class="bg-animation"></div>

    <div class="admin-container">
        {{-- Sidebar --}}
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-logo">
                <div class="logo-content">
                    <div class="logo-icon">
                        <i class="icofont icofont-film"></i>
                    </div>
                    <div class="logo-text">
                        <h2>CINEGO</h2>
                        <p>Admin Panel</p>
                    </div>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="icofont icofont-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.movies.index') }}" class="{{ request()->routeIs('admin.movies.*') ? 'active' : '' }}">
                        <i class="icofont icofont-film"></i>
                        <span>Movies</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.studios.index')}}" class="{{ request()->routeIs('admin.studios.*') ? 'active' : '' }}">
                        <i class="icofont icofont-ui-home"></i>
                        <span>Studios</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.seats.index')}}" class="{{ request()->routeIs('admin.seats.*') ? 'active' : '' }}">
                        <i class="icofont icofont-chair"></i>
                        <span>Seats</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.schedules.index')}}" class="{{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                        <i class="icofont icofont-envelope-open"></i>
                        <span>Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.bookings.index')}}" class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                        <i class="icofont icofont-address-book"></i>
                        <span>Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="icofont icofont-chart-bar-graph"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="">
                        <i class="icofont icofont-ui-settings"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-profile-card">
                    <div class="profile-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="profile-info">
                        <p class="profile-name">{{ Auth::user()->name }}</p>
                        <p class="profile-role">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="icofont icofont-logout"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="admin-content">
            {{-- Topbar --}}
            <div class="admin-topbar">
                <div class="topbar-left">
                    <div>
                        <h1 class="page-title">
                            <i class="icofont icofont-dashboard"></i>
                            Dashboard
                        </h1>
                        <div class="breadcrumb">
                            <a href="{{ route('admin.dashboard') }}">Home</a>
                            <span>/</span>
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>

                <div class="topbar-right">
                    <div class="topbar-search">
                        <i class="icofont icofont-search"></i>
                        <input type="text" placeholder="Search anything...">
                    </div>

                    <div class="notification-btn">
                        <i class="icofont icofont-notification"></i>
                        <span class="notification-badge">5</span>
                    </div>

                    <div class="user-menu">
                        <div class="user-menu-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="user-menu-info">
                            <span class="user-menu-name">{{ Auth::user()->name }}</span>
                            <span class="user-menu-role">Admin</span>
                        </div>
                        <i class="icofont icofont-simple-down"></i>
                    </div>
                </div>
            </div>

            {{-- Content Area --}}
            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        
        // You can add a hamburger menu button for mobile
        // and toggle the 'active' class on the sidebar
    </script>
</body>
</html>