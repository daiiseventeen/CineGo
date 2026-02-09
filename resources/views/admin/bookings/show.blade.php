@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Booking</h5>
    </div>

    <div class="card-body">
        <p><strong>Kode Booking:</strong> {{ $booking->booking_code }}</p>
        <p><strong>User:</strong> {{ $booking->user->name }}</p>
        <p><strong>Film:</strong> {{ $booking->schedule->movie->title }}</p>
        <p><strong>Studio:</strong> {{ $booking->schedule->studio->name }}</p>
        <p><strong>Jadwal:</strong>
            {{ \Carbon\Carbon::parse($booking->schedule->show_date)->format('d M Y') }}
            {{ \Carbon\Carbon::parse($booking->schedule->show_time)->format('H:i') }}
        </p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($booking->total_price) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

        <hr>

        <h6>Pembayaran</h6>
        @if($booking->payment)
            <p>Status: {{ $booking->payment->payment_status }}</p>
            <p>Metode: {{ $booking->payment->payment_method }}</p>
        @else
            <p class="text-muted">Belum ada pembayaran</p>
        @endif

        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
