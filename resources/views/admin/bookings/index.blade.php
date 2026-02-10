@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

    .content-area {
        padding: 0 !important;
    }

    .page-header {
        background: linear-gradient(135deg, #1a0a0a 0%, #1b0a0a 50%, #0a0a0a 100%);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 50%, rgba(239, 68, 68, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(220, 38, 38, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .header-content {
        position: relative;
        z-index: 1;
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .header-left h1 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 42px;
        color: #fff;
        margin: 0 0 8px 0;
        letter-spacing: 3px;
        background: linear-gradient(135deg, #fff 0%, #ef4444 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .header-left p {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 28px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(239, 68, 68, 0.5);
    }

    .content-container {
        padding: 40px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .card-wrapper {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .modern-table {
        width: 100%;
        min-width: 1000px;
        border-collapse: collapse;
    }

    .modern-table thead {
        background: rgba(255, 255, 255, 0.03);
    }

    .modern-table thead th {
        padding: 18px 20px;
        text-align: left;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .modern-table tbody tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .modern-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.03);
    }

    .modern-table tbody td {
        padding: 20px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
    }

    .booking-code {
        font-family: 'Monaco', monospace;
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.2);
        padding: 8px 14px;
        border-radius: 8px;
        color: #ef4444;
        display: inline-block;
    }

    .price-value {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 20px;
        color: #10b981;
        letter-spacing: 1px;
    }

    .status-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-paid {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.15);
        color: #fbbf24;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .status-cancelled {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-show {
        background: rgba(59, 130, 246, 0.1);
        color: #60a5fa;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .btn-show:hover {
        background: rgba(59, 130, 246, 0.2);
        transform: translateY(-2px);
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .btn-edit:hover {
        background: rgba(245, 158, 11, 0.2);
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

    .pagination-wrapper {
        padding: 25px 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
</style>

<div class="page-header">
    <div class="header-content">
        <div class="header-left">
            <h1>Data Bookings</h1>
            <p>Manage all movie ticket bookings</p>
        </div>
        <a href="{{ route('admin.bookings.create') }}" class="btn-add">
            <i class="icofont icofont-plus"></i>
            Tambah Booking
        </a>
    </div>
</div>

<div class="content-container">
    <div class="card-wrapper">
        <div class="table-responsive">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>KODE</th>
                        <th>USER</th>
                        <th>FILM</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th style="text-align: right;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>
                            <span class="booking-code">{{ $booking->booking_code }}</span>
                        </td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->schedule->movie->title }}</td>
                        <td>
                            <span class="price-value">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <span class="status-badge status-{{ $booking->status }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons" style="justify-content: flex-end;">
                                <a href="{{ route('admin.bookings.show', $booking) }}" 
                                   class="btn-action btn-show" 
                                   title="Show">
                                    <i class="icofont icofont-eye"></i>
                                </a>
                                <a href="{{ route('admin.bookings.edit', $booking) }}" 
                                   class="btn-action btn-edit" 
                                   title="Edit">
                                    <i class="icofont icofont-edit"></i>
                                </a>
                                <form action="{{ route('admin.bookings.destroy', $booking) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('Hapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Delete">
                                        <i class="icofont icofont-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($bookings->hasPages())
            <div class="pagination-wrapper">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection