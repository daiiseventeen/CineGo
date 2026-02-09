@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Booking</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf
            @include('admin.bookings.form')
        </form>
    </div>
</div>
@endsection
