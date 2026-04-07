@extends('layouts.admin')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area padding */
.content-area {
    padding: 0 !important;
}

/* Dashboard Container */
.dashboard-wrapper {
    padding: 0;
}

/* Welcome Banner */
.welcome-banner {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
    padding: 50px 40px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
    border-radius: 0;
}

.welcome-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(239, 68, 68, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(239, 68, 68, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.welcome-content {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
}

.welcome-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    color: #fff;
    margin: 0 0 8px 0;
    letter-spacing: 3px;
    animation: fadeInUp 0.6s ease;
}

.welcome-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
    animation: fadeInUp 0.6s ease 0.2s backwards;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding: 0 40px 30px;
    max-width: 1400px;
    margin: 0 auto;
}

.stat-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--color) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.stat-card:hover {
    transform: translateY(-8px);
    background: rgba(255, 255, 255, 0.04);
    border-color: rgba(239, 68, 68, 0.3);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-card:nth-child(1) { --color: #ef4444; animation: fadeInUp 0.6s ease 0.1s backwards; }
.stat-card:nth-child(2) { --color: #3b82f6; animation: fadeInUp 0.6s ease 0.2s backwards; }
.stat-card:nth-child(3) { --color: #10b981; animation: fadeInUp 0.6s ease 0.3s backwards; }
.stat-card:nth-child(4) { --color: #f59e0b; animation: fadeInUp 0.6s ease 0.4s backwards; }

.stat-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    position: relative;
    transition: all 0.4s ease;
}

.stat-card:nth-child(1) .stat-icon {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.stat-card:nth-child(2) .stat-icon {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
}

.stat-card:nth-child(3) .stat-icon {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
}

.stat-card:nth-child(4) .stat-icon {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    background: rgba(16, 185, 129, 0.1);
    border-radius: 20px;
    font-size: 12px;
    color: #10b981;
    font-weight: 600;
}

.stat-trend.down {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.stat-trend i {
    font-size: 14px;
}

.stat-body h3 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 42px;
    color: #fff;
    margin: 0 0 5px 0;
    letter-spacing: 1px;
}

.stat-label {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
}

/* Section Container */
.section-container {
    padding: 0 40px 40px;
    max-width: 1400px;
    margin: 0 auto;
}

.dashboard-section {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 30px;
    animation: fadeInUp 0.6s ease;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.section-title i {
    color: #ef4444;
    font-size: 32px;
}

.section-action {
    padding: 10px 20px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: rgba(255, 255, 255, 0.7);
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.section-action:hover {
    background: rgba(239, 68, 68, 0.1);
    border-color: rgba(239, 68, 68, 0.3);
    color: #ef4444;
}

/* Modern Table */
.modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

.modern-table thead tr {
    background: rgba(255, 255, 255, 0.02);
}

.modern-table thead th {
    padding: 15px 20px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.modern-table thead th:first-child {
    border-left: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 8px 0 0 8px;
}

.modern-table thead th:last-child {
    border-right: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 0 8px 8px 0;
}

.modern-table tbody tr {
    background: rgba(255, 255, 255, 0.02);
    transition: all 0.3s ease;
}

.modern-table tbody tr:hover {
    background: rgba(255, 255, 255, 0.04);
    transform: scale(1.01);
}

.modern-table tbody td {
    padding: 18px 20px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.modern-table tbody td:first-child {
    border-left: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 8px 0 0 8px;
    font-weight: 600;
    color: #fff;
}

.modern-table tbody td:last-child {
    border-right: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 0 8px 8px 0;
}

/* Rating Stars */
.rating {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    background: rgba(245, 158, 11, 0.1);
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    color: #f59e0b;
}

.rating i {
    color: #f59e0b;
}

/* Status Badge */
.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.status-success {
    background: rgba(16, 185, 129, 0.15);
    color: #10b981;
}

.status-pending {
    background: rgba(245, 158, 11, 0.15);
    color: #f59e0b;
}

.status-failed {
    background: rgba(239, 68, 68, 0.15);
    color: #ef4444;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
}

.btn-action {
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-edit {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
    border: 1px solid rgba(59, 130, 246, 0.2);
}

.btn-edit:hover {
    background: rgba(59, 130, 246, 0.2);
    transform: translateY(-2px);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: translateY(-2px);
}

/* Progress Bar */
.capacity-progress {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.capacity-text {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
}

.progress-bar {
    width: 100%;
    height: 8px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #ef4444 0%, #dc2626 100%);
    border-radius: 10px;
    transition: width 0.6s ease;
    position: relative;
    overflow: hidden;
}

.progress-fill::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Two Column Layout */
.two-column-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .two-column-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .welcome-banner {
        padding: 30px 20px;
    }
    
    .welcome-title {
        font-size: 36px;
    }
    
    .stats-grid,
    .section-container {
        padding: 0 20px 20px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .dashboard-section {
        padding: 20px;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .modern-table {
        font-size: 12px;
    }
    
    .modern-table thead {
        display: none;
    }
    
    .modern-table tbody tr {
        display: block;
        margin-bottom: 15px;
    }
    
    .modern-table tbody td {
        display: block;
        text-align: right;
        padding: 10px;
        border: none !important;
        border-radius: 0 !important;
    }
    
    .modern-table tbody td:first-child {
        background: rgba(239, 68, 68, 0.1);
        border-radius: 8px 8px 0 0 !important;
    }
    
    .modern-table tbody td:last-child {
        border-radius: 0 0 8px 8px !important;
    }
    
    .modern-table tbody td::before {
        content: attr(data-label);
        float: left;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        font-size: 11px;
    }
}
</style>

<div class="dashboard-wrapper">
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-content">
            <h1 class="welcome-title">Welcome Back, {{ Auth::user()->name }}! 👋</h1>
            <p class="welcome-subtitle">Here's what's happening with your cinema today</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="icofont icofont-film"></i>
                </div>
                <div class="stat-trend">
                    <i class="icofont icofont-arrow-up"></i>
                    12%
                </div>
            </div>
            <div class="stat-body">
                <h3>24</h3>
                <p class="stat-label">Total Film</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="icofont icofont-ticket"></i>
                </div>
                <div class="stat-trend">
                    <i class="icofont icofont-arrow-up"></i>
                    18%
                </div>
            </div>
            <div class="stat-body">
                <h3>1,248</h3>
                <p class="stat-label">Tiket Terjual</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="icofont icofont-money"></i>
                </div>
                <div class="stat-trend">
                    <i class="icofont icofont-arrow-up"></i>
                    24%
                </div>
            </div>
            <div class="stat-body">
                <h3>$12,450</h3>
                <p class="stat-label">Pendapatan</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon">
                    <i class="icofont icofont-users"></i>
                </div>
                <div class="stat-trend">
                    <i class="icofont icofont-arrow-up"></i>
                    8%
                </div>
            </div>
            <div class="stat-body">
                <h3>342</h3>
                <p class="stat-label">Total Pengguna</p>
            </div>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="section-container">
        <!-- Film Terbaru Section -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="icofont icofont-film"></i>
                    Film Terbaru
                </h2>
                <a href="#" class="section-action">
                    View All
                    <i class="icofont icofont-rounded-right"></i>
                </a>
            </div>

            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Judul Film</th>
                        <th>Kategori</th>
                        <th>Tanggal Rilis</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Judul Film">Boyz II Men</td>
                        <td data-label="Kategori">Drama</td>
                        <td data-label="Tanggal Rilis">2025-12-01</td>
                        <td data-label="Rating">
                            <span class="rating">
                                <i class="icofont icofont-star"></i>
                                4.5
                            </span>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <button class="btn-action btn-edit">
                                    <i class="icofont icofont-edit"></i> Edit
                                </button>
                                <button class="btn-action btn-delete">
                                    <i class="icofont icofont-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Judul Film">Tale of Revenge</td>
                        <td data-label="Kategori">Action</td>
                        <td data-label="Tanggal Rilis">2025-12-05</td>
                        <td data-label="Rating">
                            <span class="rating">
                                <i class="icofont icofont-star"></i>
                                4.3
                            </span>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <button class="btn-action btn-edit">
                                    <i class="icofont icofont-edit"></i> Edit
                                </button>
                                <button class="btn-action btn-delete">
                                    <i class="icofont icofont-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Judul Film">Beast Beauty</td>
                        <td data-label="Kategori">Fantasy</td>
                        <td data-label="Tanggal Rilis">2025-12-10</td>
                        <td data-label="Rating">
                            <span class="rating">
                                <i class="icofont icofont-star"></i>
                                4.7
                            </span>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <button class="btn-action btn-edit">
                                    <i class="icofont icofont-edit"></i> Edit
                                </button>
                                <button class="btn-action btn-delete">
                                    <i class="icofont icofont-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Two Column Layout -->
        <div class="two-column-grid">
            <!-- Transaksi Terbaru Section -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="icofont icofont-money"></i>
                        Transaksi Terbaru
                    </h2>
                </div>

                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Pengguna</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="No. Transaksi">#TRX001</td>
                            <td data-label="Pengguna">John Doe</td>
                            <td data-label="Jumlah">$45.00</td>
                            <td data-label="Status">
                                <span class="status-badge status-success">
                                    <i class="icofont icofont-check"></i>
                                    Sukses
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="No. Transaksi">#TRX002</td>
                            <td data-label="Pengguna">Jane Smith</td>
                            <td data-label="Jumlah">$60.00</td>
                            <td data-label="Status">
                                <span class="status-badge status-success">
                                    <i class="icofont icofont-check"></i>
                                    Sukses
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="No. Transaksi">#TRX003</td>
                            <td data-label="Pengguna">Robert Brown</td>
                            <td data-label="Jumlah">$50.00</td>
                            <td data-label="Status">
                                <span class="status-badge status-pending">
                                    <i class="icofont icofont-clock-time"></i>
                                    Pending
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Jadwal Tayang Section -->
            <div class="dashboard-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="icofont icofont-calendar"></i>
                        Jadwal Minggu Ini
                    </h2>
                </div>

                <table class="modern-table">
                    <thead>
                        <tr>
                            <th>Film</th>
                            <th>Studio</th>
                            <th>Waktu</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Film">Boyz II Men</td>
                            <td data-label="Studio">Studio A</td>
                            <td data-label="Waktu">14:00</td>
                            <td data-label="Kapasitas">
                                <div class="capacity-progress">
                                    <span class="capacity-text">85/100</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 85%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Film">Tale of Revenge</td>
                            <td data-label="Studio">Studio B</td>
                            <td data-label="Waktu">18:00</td>
                            <td data-label="Kapasitas">
                                <div class="capacity-progress">
                                    <span class="capacity-text">105/120</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 87.5%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Film">Beast Beauty</td>
                            <td data-label="Studio">Studio C</td>
                            <td data-label="Waktu">20:30</td>
                            <td data-label="Kapasitas">
                                <div class="capacity-progress">
                                    <span class="capacity-text">78/100</span>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 78%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection