<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEGO - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Iconfont CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}" media="all" />
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

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f3460 0%, #16213e 100%);
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .sidebar-logo {
            padding: 25px 20px;
            border-bottom: 2px solid #ff6b6b;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo h2 {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            color: #ff6b6b;
        }

        .sidebar-logo i {
            font-size: 24px;
            color: #ff6b6b;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            padding: 0;
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            color: #b0b0b0;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
            font-weight: 500;
        }

        .sidebar-menu a i {
            font-size: 18px;
            width: 20px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
            padding-left: 25px;
            border-left: 3px solid #ff6b6b;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px;
            border-top: 2px solid rgba(255, 107, 107, 0.3);
            background: rgba(0, 0, 0, 0.2);
        }

        .logout-btn {
            width: 100%;
            padding: 10px;
            background-color: #ff6b6b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background-color: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        /* Main Content */
        .admin-content {
            margin-left: 280px;
            flex: 1;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 30px;
            overflow-y: auto;
        }

        /* Header */
        .admin-header {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .admin-header h1 {
            font-size: 28px;
            color: #333;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-header h1 i {
            color: #ff6b6b;
            font-size: 32px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b, #ff5252);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .user-details span {
            display: block;
            color: #666;
            font-size: 13px;
        }

        .user-details strong {
            color: #333;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 4px solid #ff6b6b;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            font-size: 32px;
            color: #ff6b6b;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #999;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        /* Sections */
        .admin-section {
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
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ff6b6b;
        }

        .section-title i {
            color: #ff6b6b;
            font-size: 26px;
        }

        /* Table */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead {
            background: #f8f9fa;
        }

        .admin-table th {
            padding: 15px;
            text-align: left;
            color: #333;
            font-weight: bold;
            border-bottom: 2px solid #eee;
        }

        .admin-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #666;
        }

        .admin-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #ff6b6b;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff5252;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 200px;
            }

            .admin-content {
                margin-left: 200px;
                padding: 15px;
            }

            .admin-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .admin-table {
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .admin-sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .admin-content {
                margin-left: 0;
            }

            .sidebar-footer {
                position: relative;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        {{-- Sidebar --}}
        <aside class="admin-sidebar">
            <div class="sidebar-logo">
                <i class="icofont icofont-film"></i>
                <h2>CINEGO</h2>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="icofont icofont-dashboard"></i> Dashboard</a></li>
                <li><a href="#"><i class="icofont icofont-film"></i> Film</a></li>
                <li><a href="#"><i class="icofont icofont-calendar"></i> Jadwal</a></li>
                <li><a href="#"><i class="icofont icofont-money"></i> Transaksi</a></li>
                <li><a href="#"><i class="icofont icofont-users"></i> Pengguna</a></li>
                <li><a href="#"><i class="icofont icofont-chart"></i> Laporan</a></li>
                <li><a href="#"><i class="icofont icofont-settings"></i> Pengaturan</a></li>
            </ul>

            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="icofont icofont-logout"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="admin-content">
            {{-- Header --}}
            <div class="admin-header">
                <h1>
                    <i class="icofont icofont-dashboard"></i>
                    Dashboard Admin
                </h1>
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span>Selamat datang,</span>
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>
