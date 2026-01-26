@extends('layouts.admin')

@section('content')
<!-- Statistics Cards -->
<div class="dashboard-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="icofont icofont-film"></i>
        </div>
        <div class="stat-label">Total Film</div>
        <div class="stat-value">24</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="icofont icofont-ticket"></i>
        </div>
        <div class="stat-label">Tiket Terjual</div>
        <div class="stat-value">1,248</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="icofont icofont-money"></i>
        </div>
        <div class="stat-label">Pendapatan</div>
        <div class="stat-value">$12,450</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="icofont icofont-users"></i>
        </div>
        <div class="stat-label">Total Pengguna</div>
        <div class="stat-value">342</div>
    </div>
</div>

<!-- Film Terbaru Section -->
<div class="admin-section">
    <h2 class="section-title">
        <i class="icofont icofont-film"></i>
        Film Terbaru
    </h2>

    <table class="admin-table">
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
                <td>Boyz II Men</td>
                <td>Drama</td>
                <td>2025-12-01</td>
                <td>⭐ 4.5</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger">
                        <i class="icofont icofont-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            <tr>
                <td>Tale of Revenge</td>
                <td>Action</td>
                <td>2025-12-05</td>
                <td>⭐ 4.3</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger">
                        <i class="icofont icofont-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            <tr>
                <td>Beast Beauty</td>
                <td>Fantasy</td>
                <td>2025-12-10</td>
                <td>⭐ 4.7</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger">
                        <i class="icofont icofont-trash"></i> Hapus
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Transaksi Terbaru Section -->
<div class="admin-section">
    <h2 class="section-title">
        <i class="icofont icofont-money"></i>
        Transaksi Terbaru
    </h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>No. Transaksi</th>
                <th>Pengguna</th>
                <th>Film</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#TRX001</td>
                <td>John Doe</td>
                <td>Boyz II Men</td>
                <td>$45.00</td>
                <td>2025-12-15</td>
                <td><span style="background: #d4edda; color: #155724; padding: 5px 10px; border-radius: 3px; font-size: 12px;">✓ Sukses</span></td>
            </tr>
            <tr>
                <td>#TRX002</td>
                <td>Jane Smith</td>
                <td>Tale of Revenge</td>
                <td>$60.00</td>
                <td>2025-12-15</td>
                <td><span style="background: #d4edda; color: #155724; padding: 5px 10px; border-radius: 3px; font-size: 12px;">✓ Sukses</span></td>
            </tr>
            <tr>
                <td>#TRX003</td>
                <td>Robert Brown</td>
                <td>Beast Beauty</td>
                <td>$50.00</td>
                <td>2025-12-14</td>
                <td><span style="background: #fff3cd; color: #856404; padding: 5px 10px; border-radius: 3px; font-size: 12px;">⏳ Pending</span></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Jadwal Tayang Section -->
<div class="admin-section">
    <h2 class="section-title">
        <i class="icofont icofont-calendar"></i>
        Jadwal Tayang Minggu Ini
    </h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Film</th>
                <th>Studio</th>
                <th>Waktu Tayang</th>
                <th>Kapasitas</th>
                <th>Terjual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Boyz II Men</td>
                <td>Studio A</td>
                <td>14:00 - 16:30</td>
                <td>100</td>
                <td>85</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td>Tale of Revenge</td>
                <td>Studio B</td>
                <td>18:00 - 20:45</td>
                <td>120</td>
                <td>105</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td>Beast Beauty</td>
                <td>Studio C</td>
                <td>20:30 - 22:15</td>
                <td>100</td>
                <td>78</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="icofont icofont-edit"></i> Edit
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
