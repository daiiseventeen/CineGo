@extends('layouts.admin')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.admin-content {
    padding: 0 !important;
    background: #0a0a0a !important;
}

/* Page Header */
.page-header {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1b1b 50%, #1a0a0a 100%);
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
        radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.header-content {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 20px;
}

.back-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 8px;
}

.back-button:hover {
    color: #22c55e;
    background: rgba(34, 197, 94, 0.1);
}

.header-title h1 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    color: #fff;
    margin: 0;
    letter-spacing: 2px;
    background: linear-gradient(135deg, #fff 0%, #22c55e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header-title p {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 5px 0 0 0;
}

/* Form Container */
.form-container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 0 40px;
}

.form-card {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 40px;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.btn {
    padding: 12px 30px;
    border-radius: 12px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    font-size: 14px;
}

.btn-submit {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
}

.btn-cancel {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.btn-cancel:hover {
    background: rgba(255, 255, 255, 0.15);
    color: rgba(255, 255, 255, 0.9);
}
</style>

<!-- Header -->
<div class="page-header">
        <div class="header-content">
            <a href="{{ route('admin.payments.index') }}" class="back-button">
                <i class="icofont icofont-arrow-left"></i>
                Kembali
            </a>
            <div class="header-title">
                <h1>
                    <i class="icofont icofont-plus"></i> Tambah Pembayaran
                </h1>
                <p>Buat data pembayaran baru ke dalam sistem</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="form-container">
        <div class="form-card">
            <form action="{{ route('admin.payments.store') }}" method="POST">
                @csrf

                @include('admin.payments.form', ['payment' => null])

                <div class="form-actions">
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-cancel">
                        <i class="icofont icofont-close"></i>
                        Batal
                    </a>
                    <button type="submit" class="btn btn-submit">
                        <i class="icofont icofont-check"></i>
                        Tambah Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
