@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Booking Seat</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.booking-seats.update', $bookingSeat) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.bookings_seats.form')
        </form>
    </div>
</div>
@endsection
