@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Bookings</h5>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
            + Tambah Booking
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>User</th>
                    <th>Film</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->schedule->movie->title }}</td>
                    <td>Rp {{ number_format($booking->total_price) }}</td>
                    <td>
                        <span class="badge bg-{{ $booking->status === 'paid' ? 'success' : 'warning' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $bookings->links() }}
    </div>
</div>
@endsection
