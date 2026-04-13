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

/* Details Container */
.details-container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 0 40px;
}

.details-card {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 40px;
}

/* Details Grid */
.details-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-bottom: 30px;
}

.details-grid.full {
    grid-template-columns: 1fr;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-label {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.detail-label i {
    font-size: 14px;
    color: #22c55e;
}

.detail-value {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: #fff;
    font-weight: 500;
}

.detail-value.amount {
    font-size: 20px;
    color: #22c55e;
    font-weight: 600;
}

/* Status Badges */
.status-badge {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    width: fit-content;
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
    padding: 6px 12px;
    border-radius: 8px;
    background: rgba(59, 130, 246, 0.15);
    color: #3b82f6;
    font-size: 12px;
    font-weight: 500;
    width: fit-content;
}

/* Info Box */
.info-box {
    background: rgba(34, 197, 94, 0.1);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 30px;
}

.info-box-title {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #22c55e;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-box-content {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

/* Actions */
.details-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    flex-wrap: wrap;
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

.btn-edit {
    background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
    color: white;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
}

.btn-back {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.btn-back:hover {
    background: rgba(255, 255, 255, 0.15);
    color: rgba(255, 255, 255, 0.9);
}

@media (max-width: 768px) {
    .details-grid {
        grid-template-columns: 1fr;
    }
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
                    <i class="icofont icofont-credit"></i> Detail Pembayaran
                </h1>
                <p>Order ID: <strong>{{ $payment->order_id }}</strong></p>
            </div>
        </div>
    </div>

    <!-- Details -->
    <div class="details-container">
        <div class="details-card">
            <!-- Status Info Box -->
            <div class="info-box">
                <div class="info-box-title">
                    <i class="icofont icofont-check-alt"></i>
                    Payment Status
                </div>
                <div class="info-box-content">
                    <span class="status-badge status-{{ $payment->payment_status }}">
                        {{ ucfirst($payment->payment_status) }}
                    </span>
                </div>
            </div>

            <!-- Main Details -->
            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-credit"></i>
                        Order ID
                    </span>
                    <span class="detail-value">{{ $payment->order_id }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-book"></i>
                        Booking ID
                    </span>
                    <span class="detail-value">#{{ $payment->booking_id }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-credit"></i>
                        Payment Method
                    </span>
                    <span class="method-badge">
                        {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-calculator"></i>
                        Payment Type
                    </span>
                    <span class="detail-value">{{ ucfirst($payment->payment_type) }}</span>
                </div>

                <div class="detail-item full-width">
                    <span class="detail-label">
                        <i class="icofont icofont-money"></i>
                        Gross Amount
                    </span>
                    <span class="detail-value amount">Rp {{ number_format($payment->gross_amount, 0, ',', '.') }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-hash"></i>
                        Transaction ID
                    </span>
                    <span class="detail-value">{{ $payment->transaction_id ?? '-' }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-calendar"></i>
                        Paid At
                    </span>
                    <span class="detail-value">
                        {{ $payment->paid_at ? $payment->paid_at->format('d M Y H:i') : '-' }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">
                        <i class="icofont icofont-calendar"></i>
                        Created At
                    </span>
                    <span class="detail-value">{{ $payment->created_at->format('d M Y H:i') }}</span>
                </div>
            </div>

            <!-- Booking Info -->
            @if($payment->booking)
                <div class="info-box">
                    <div class="info-box-title">
                        <i class="icofont icofont-book"></i>
                        Booking Information
                    </div>
                    <div class="info-box-content">
                        <strong>Booking ID:</strong> #{{ $payment->booking->id }}<br>
                        <strong>User ID:</strong> {{ $payment->booking->user_id }}<br>
                        <strong>Booking Status:</strong> {{ ucfirst($payment->booking->booking_status ?? 'N/A') }}
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="details-actions">
                <a href="{{ route('admin.payments.index') }}" class="btn btn-back">
                    <i class="icofont icofont-arrow-left"></i>
                    Kembali
                </a>
                <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-edit">
                    <i class="icofont icofont-edit"></i>
                    Edit Pembayaran
                </a>
            </div>
        </div>
    </div>
@endsection
