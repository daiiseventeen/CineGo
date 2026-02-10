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
        max-width: 900px;
        margin: 0 auto;
    }

    .page-title {
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

    .page-subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    .form-container {
        padding: 40px;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        overflow: hidden;
    }

    .form-card-header {
        padding: 25px 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.02);
    }

    .form-card-header h2 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 28px;
        color: #fff;
        margin: 0;
        letter-spacing: 2px;
    }

    .form-card-body {
        padding: 35px;
    }
</style>

<div class="page-header">
    <div class="header-content">
        <h1 class="page-title">Tambah Booking</h1>
        <p class="page-subtitle">Create a new ticket booking</p>
    </div>
</div>

<div class="form-container">
    <div class="form-card">
        <div class="form-card-header">
            <h2>Booking Information</h2>
        </div>
        <div class="form-card-body">
            <form action="{{ route('admin.bookings.store') }}" method="POST">
                @csrf
                @include('admin.bookings.form')
            </form>
        </div>
    </div>
</div>
@endsection