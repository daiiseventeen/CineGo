@extends('layouts.admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

    .content-area {
        padding: 0 !important;
    }

    /* Page Header */
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
        max-width: 1000px;
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

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .back-button:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        transform: translateX(-5px);
    }

    /* Content Container */
    .content-container {
        padding: 40px;
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Ticket Container */
    .ticket-container {
        position: relative;
        animation: fadeInUp 0.8s ease;
    }

    /* Cinema Ticket Design */
    .cinema-ticket {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        position: relative;
    }

    /* Ticket Perforations */
    .ticket-perforation {
        position: relative;
        height: 2px;
        background: #0a0a0a;
    }

    .ticket-perforation::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
        height: 1px;
        background-image: repeating-linear-gradient(
            90deg,
            #0a0a0a 0px,
            #0a0a0a 10px,
            transparent 10px,
            transparent 20px
        );
    }

    /* Ticket Top Section */
    .ticket-top {
        padding: 40px;
        position: relative;
    }

    .ticket-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .cinema-logo {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 42px;
        background: linear-gradient(135deg, #fff 0%, #ef4444 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: 4px;
        margin: 0;
    }

    .ticket-type {
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 5px;
    }

    /* Movie Info */
    .movie-info {
        text-align: center;
        margin-bottom: 35px;
    }

    .movie-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 38px;
        color: #fff;
        margin: 0 0 10px 0;
        letter-spacing: 2px;
    }

    .movie-subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.6);
    }

    /* Ticket Details Grid */
    .ticket-details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }

    .detail-item {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 20px;
        text-align: center;
    }

    .detail-label {
        font-family: 'Poppins', sans-serif;
        font-size: 10px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }

    .detail-value {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 24px;
        color: #fff;
        letter-spacing: 1px;
    }

    .detail-value.highlight {
        color: #ef4444;
        font-size: 28px;
    }

    /* Status Badge */
    .status-display {
        text-align: center;
        margin: 30px 0;
    }

    .status-badge-large {
        display: inline-block;
        padding: 12px 32px;
        border-radius: 50px;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 20px;
        letter-spacing: 2px;
    }

    .status-paid {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
        border: 2px solid rgba(16, 185, 129, 0.3);
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.15);
        color: #fbbf24;
        border: 2px solid rgba(245, 158, 11, 0.3);
    }

    .status-cancelled {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
        border: 2px solid rgba(239, 68, 68, 0.3);
    }

    /* Ticket Bottom Section */
    .ticket-bottom {
        padding: 40px;
        background: rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    /* Barcode Section */
    .barcode-section {
        margin-bottom: 25px;
    }

    .barcode-title {
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 15px;
    }

    .barcode {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        display: inline-block;
        margin-bottom: 15px;
    }

    .barcode-lines {
        display: flex;
        gap: 2px;
        height: 80px;
        align-items: flex-end;
    }

    .barcode-line {
        width: 3px;
        background: #000;
        animation: barcodeAnimate 2s ease-in-out infinite;
    }

    @keyframes barcodeAnimate {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }

    .booking-code-display {
        font-family: 'Monaco', monospace;
        font-size: 18px;
        color: #fff;
        letter-spacing: 3px;
        margin-top: 10px;
    }

    /* Payment Info */
    .payment-info {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 25px;
        margin-top: 30px;
    }

    .payment-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 20px;
        color: #fff;
        margin: 0 0 20px 0;
        letter-spacing: 2px;
        text-align: center;
    }

    .payment-details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .payment-item {
        text-align: center;
    }

    .payment-label {
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .payment-value {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #fff;
        font-weight: 600;
    }

    .no-payment {
        text-align: center;
        color: rgba(255, 255, 255, 0.4);
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-style: italic;
    }

    /* Decorative Elements */
    .ticket-corner {
        position: absolute;
        width: 40px;
        height: 40px;
        border: 2px solid rgba(239, 68, 68, 0.2);
    }

    .ticket-corner.top-left {
        top: 20px;
        left: 20px;
        border-right: none;
        border-bottom: none;
        border-radius: 8px 0 0 0;
    }

    .ticket-corner.top-right {
        top: 20px;
        right: 20px;
        border-left: none;
        border-bottom: none;
        border-radius: 0 8px 0 0;
    }

    .ticket-corner.bottom-left {
        bottom: 20px;
        left: 20px;
        border-right: none;
        border-top: none;
        border-radius: 0 0 0 8px;
    }

    .ticket-corner.bottom-right {
        bottom: 20px;
        right: 20px;
        border-left: none;
        border-top: none;
        border-radius: 0 0 8px 0;
    }

    /* Actions */
    .ticket-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
    }

    .btn-action {
        padding: 12px 28px;
        border: none;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.15);
        color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
    }

    .btn-edit:hover {
        background: rgba(245, 158, 11, 0.25);
        transform: translateY(-2px);
    }

    .btn-print {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
    }

    .btn-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(239, 68, 68, 0.5);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .ticket-details,
        .payment-details {
            grid-template-columns: 1fr;
        }

        .movie-title {
            font-size: 28px;
        }

        .cinema-logo {
            font-size: 32px;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="header-content">
        <a href="{{ route('admin.bookings.index') }}" class="back-button">
            <i class="icofont icofont-arrow-left"></i>
            Back to Bookings
        </a>
        <h1 class="page-title">Booking Details</h1>
    </div>
</div>

<!-- Content Container -->
<div class="content-container">
    <div class="ticket-container">
        <div class="cinema-ticket">
            <!-- Decorative Corners -->
            <div class="ticket-corner top-left"></div>
            <div class="ticket-corner top-right"></div>
            
            <!-- Top Section -->
            <div class="ticket-top">
                <!-- Ticket Header -->
                <div class="ticket-header">
                    <h1 class="cinema-logo">CINEGO</h1>
                    <p class="ticket-type">Cinema Ticket</p>
                </div>

                <!-- Movie Info -->
                <div class="movie-info">
                    <h2 class="movie-title">{{ $booking->schedule->movie->title }}</h2>
                    <p class="movie-subtitle">{{ $booking->schedule->studio->name }}</p>
                </div>

                <!-- Ticket Details -->
                <div class="ticket-details">
                    <div class="detail-item">
                        <div class="detail-label">Date</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($booking->schedule->show_date)->format('d M Y') }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Time</div>
                        <div class="detail-value">
                            {{ \Carbon\Carbon::parse($booking->schedule->show_time)->format('H:i') }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Customer</div>
                        <div class="detail-value" style="font-size: 18px;">
                            {{ $booking->user->name }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Total Price</div>
                        <div class="detail-value highlight">
                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="status-display">
                    <span class="status-badge-large status-{{ $booking->status }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>

            <!-- Perforation -->
            <div class="ticket-perforation"></div>

            <!-- Bottom Section -->
            <div class="ticket-bottom">
                <!-- Barcode -->
                <div class="barcode-section">
                    <div class="barcode-title">Booking Code</div>
                    <div class="barcode">
                        <div class="barcode-lines">
                            @php
                                $barcodeCount = 40;
                                $heights = [30, 80, 50, 70, 40, 80, 60, 50, 80, 40];
                            @endphp
                            @for($i = 0; $i < $barcodeCount; $i++)
                                <div class="barcode-line" 
                                     style="height: {{ $heights[$i % 10] }}px; animation-delay: {{ $i * 0.05 }}s;">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="booking-code-display">{{ $booking->booking_code }}</div>
                </div>

                <!-- Payment Info -->
                <div class="payment-info">
                    <h3 class="payment-title">Payment Information</h3>
                    @if($booking->payment)
                        <div class="payment-details">
                            <div class="payment-item">
                                <div class="payment-label">Status</div>
                                <div class="payment-value">{{ ucfirst($booking->payment->payment_status) }}</div>
                            </div>
                            <div class="payment-item">
                                <div class="payment-label">Method</div>
                                <div class="payment-value">{{ ucfirst($booking->payment->payment_method) }}</div>
                            </div>
                        </div>
                    @else
                        <p class="no-payment">No payment information available</p>
                    @endif
                </div>
            </div>

            <!-- Decorative Corners Bottom -->
            <div class="ticket-corner bottom-left"></div>
            <div class="ticket-corner bottom-right"></div>
        </div>

        <!-- Actions -->
        <div class="ticket-actions">
            <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn-action btn-edit">
                <i class="icofont icofont-edit"></i>
                Edit Booking
            </a>
            <button onclick="window.print()" class="btn-action btn-print">
                <i class="icofont icofont-print"></i>
                Print Ticket
            </button>
        </div>
    </div>
</div>

<style>
@media print {
    .page-header,
    .ticket-actions,
    .back-button {
        display: none !important;
    }
    
    .cinema-ticket {
        box-shadow: none;
        page-break-inside: avoid;
    }
}
</style>
@endsection