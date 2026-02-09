@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Booking</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.bookings.form')
        </form>
    </div>
</div>
@endsection
