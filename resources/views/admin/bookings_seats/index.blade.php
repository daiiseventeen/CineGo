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
            radial-gradient(circle at 20% 50%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
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
        background: linear-gradient(135deg, #fff 0%, #8b5cf6 100%);
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
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(139, 92, 246, 0.5);
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
        background: rgba(139, 92, 246, 0.1);
        border: 1px solid rgba(139, 92, 246, 0.2);
        padding: 8px 14px;
        border-radius: 8px;
        color: #8b5cf6;
        display: inline-block;
    }

    .seat-badge {
        background: rgba(251, 191, 36, 0.15);
        border: 1px solid rgba(251, 191, 36, 0.3);
        padding: 6px 12px;
        border-radius: 20px;
        color: #fbbf24;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .seat-badge i {
        font-size: 14px;
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
            <h1>Booking Seats</h1>
            <p>Manage seat reservations for bookings</p>
        </div>
        <a href="{{ route('admin.booking-seats.create') }}" class="btn-add">
            <i class="icofont icofont-plus"></i>
            Tambah
        </a>
    </div>
</div>

<div class="content-container">
    <div class="card-wrapper">
        <div class="table-responsive">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>BOOKING</th>
                        <th>USER</th>
                        <th>FILM</th>
                        <th>KURSI</th>
                        <th style="text-align: right;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookingSeats as $bs)
                    <tr>
                        <td>
                            <span class="booking-code">{{ $bs->booking->booking_code }}</span>
                        </td>
                        <td>{{ $bs->booking->user->name }}</td>
                        <td>{{ $bs->booking->schedule->movie->title }}</td>
                        <td>
                            <span class="seat-badge">
                                <i class="icofont icofont-chair"></i>
                                {{ $bs->seat->studio->name }} - {{ $bs->seat->seat_code }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons" style="justify-content: flex-end;">
                                <a href="{{ route('admin.booking-seats.show', $bs) }}" 
                                   class="btn-action btn-show" 
                                   title="Show">
                                    <i class="icofont icofont-eye"></i>
                                </a>
                                <a href="{{ route('admin.booking-seats.edit', $bs) }}" 
                                   class="btn-action btn-edit" 
                                   title="Edit">
                                    <i class="icofont icofont-edit"></i>
                                </a>
                                <form action="{{ route('admin.booking-seats.destroy', $bs) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('Hapus kursi ini?')">
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
        
        @if($bookingSeats->hasPages())
            <div class="pagination-wrapper">
                {{ $bookingSeats->links() }}
            </div>
        @endif
    </div>
</div>
@endsection