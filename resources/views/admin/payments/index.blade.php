@extends('layouts.admin')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.admin-content {
    padding: 0 !important;
    background: #0a0a0a !important;
}

/* Payments Hero */
.payments-hero {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
    padding: 50px 40px 40px;
    position: relative;
    overflow: hidden;
}

.payments-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.payments-hero-content {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
}

.hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 64px;
    color: #fff;
    margin: 0 0 10px 0;
    letter-spacing: 4px;
    text-transform: uppercase;
    background: linear-gradient(135deg, #fff 0%, #22c55e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: fadeInUp 0.8s ease;
}

.hero-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 35px;
    font-weight: 300;
    letter-spacing: 1px;
    animation: fadeInUp 0.8s ease 0.2s backwards;
}

/* Stats Pills */
.stats-container {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 35px;
    animation: fadeInUp 0.8s ease 0.3s backwards;
}

.stat-pill {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px 25px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    cursor: default;
}

.stat-pill:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(34, 197, 94, 0.5);
    transform: translateY(-2px);
}

.stat-pill i {
    font-size: 24px;
    color: #22c55e;
}

.stat-pill-content h4 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0;
    letter-spacing: 1px;
}

.stat-pill-content p {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: rgba(255, 255, 255, 0.5);
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
}

/* Action Bar */
.action-bar {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    animation: fadeInUp 0.8s ease 0.5s backwards;
}

.btn-add {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
}

/* Table Styling */
.table-container {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 30px;
    margin-top: 20px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
}

thead {
    background: rgba(34, 197, 94, 0.1);
    border-bottom: 2px solid rgba(34, 197, 94, 0.3);
}

th {
    padding: 15px;
    text-align: left;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 1px;
}

td {
    padding: 15px;
    color: rgba(255, 255, 255, 0.7);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

tbody tr {
    transition: all 0.3s ease;
}

tbody tr:hover {
    background: rgba(34, 197, 94, 0.05);
}

.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-paid {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
}

.status-pending {
    background: rgba(245, 158, 11, 0.2);
    color: #f59e0b;
}

.status-failed {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
}

.status-expired {
    background: rgba(107, 114, 128, 0.2);
    color: #9ca3af;
}

.method-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 8px;
    background: rgba(59, 130, 246, 0.15);
    color: #3b82f6;
    font-size: 11px;
    font-weight: 500;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    align-items: center;
}

.btn-action {
    padding: 8px 12px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-size: 12px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

.btn-view {
    background: rgba(59, 130, 246, 0.2);
    color: #3b82f6;
}

.btn-view:hover {
    background: rgba(59, 130, 246, 0.3);
}

.btn-edit {
    background: rgba(34, 197, 94, 0.2);
    color: #22c55e;
}

.btn-edit:hover {
    background: rgba(34, 197, 94, 0.3);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.3);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: rgba(255, 255, 255, 0.6);
}

.empty-state i {
    font-size: 64px;
    color: rgba(34, 197, 94, 0.3);
    margin-bottom: 20px;
    display: block;
}

.empty-state h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    margin-bottom: 10px;
    color: rgba(255, 255, 255, 0.8);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Max Width Container */
.container-xl {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
}
</style>

<div class="payments-hero">
        <div class="payments-hero-content">
            <h1 class="hero-title">
                <i class="icofont icofont-credit"></i> Payments
            </h1>
            <p class="hero-subtitle">Kelola semua transaksi pembayaran pengguna</p>

            <!-- Stats -->
            <div class="stats-container">
                <div class="stat-pill">
                    <i class="icofont icofont-credit"></i>
                    <div class="stat-pill-content">
                        <h4>{{ $payments->count() }}</h4>
                        <p>Total Pembayaran</p>
                    </div>
                </div>
                <div class="stat-pill">
                    <i class="icofont icofont-check-alt"></i>
                    <div class="stat-pill-content">
                        <h4>{{ $payments->where('payment_status', 'paid')->count() }}</h4>
                        <p>Berhasil</p>
                    </div>
                </div>
                <div class="stat-pill">
                    <i class="icofont icofont-clock-time"></i>
                    <div class="stat-pill-content">
                        <h4>{{ $payments->where('payment_status', 'pending')->count() }}</h4>
                        <p>Menunggu</p>
                    </div>
                </div>
                <div class="stat-pill">
                    <i class="icofont icofont-close-squared"></i>
                    <div class="stat-pill-content">
                        <h4>{{ $payments->where('payment_status', 'failed')->count() }}</h4>
                        <p>Gagal</p>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="action-bar">
                <a href="{{ route('admin.payments.create') }}" class="btn-add">
                    <i class="icofont icofont-plus"></i>
                    Tambah Pembayaran
                </a>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container-xl">
        <div class="table-container">
            @if($payments->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Booking ID</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Paid At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td><strong>{{ $payment->order_id }}</strong></td>
                                <td>#{{ $payment->booking_id }}</td>
                                <td>
                                    <span class="method-badge">
                                        {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}
                                    </span>
                                </td>
                                <td><strong>Rp {{ number_format($payment->gross_amount, 0, ',', '.') }}</strong></td>
                                <td>
                                    <span class="status-badge status-{{ $payment->payment_status }}">
                                        {{ ucfirst($payment->payment_status) }}
                                    </span>
                                </td>
                                <td>{{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.payments.show', $payment) }}" class="btn-action btn-view">
                                            <i class="icofont icofont-eye"></i> View
                                        </a>
                                        <a href="{{ route('admin.payments.edit', $payment) }}" class="btn-action btn-edit">
                                            <i class="icofont icofont-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="icofont icofont-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="icofont icofont-credit"></i>
                    <h3>Tidak Ada Pembayaran</h3>
                    <p>Mulai dengan menambahkan pembayaran baru</p>
                </div>
            @endif
        </div>
    </div>
@endsection
