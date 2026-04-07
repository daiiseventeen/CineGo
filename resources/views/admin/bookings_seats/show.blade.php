@extends('layouts.admin')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap');

/* Override content area */
.content-area {
    padding: 0 !important;
}

/* Page Header */
.page-header {
    background: linear-gradient(135deg, #1a0a0a 0%, #1b2d3a 50%, #1a0a0a 100%);
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
        radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
    pointer-events: none;
    animation: pulse 4s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

.page-header-content {
    position: relative;
    z-index: 1;
    max-width: 1200px;
    margin: 0 auto;
}

.page-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 42px;
    color: #fff;
    margin: 0 0 8px 0;
    letter-spacing: 3px;
    display: flex;
    align-items: center;
    gap: 15px;
    animation: slideInLeft 0.6s ease;
}

.page-title i {
    color: #60a5fa;
    font-size: 48px;
    animation: rotateIn 0.8s ease;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes rotateIn {
    from {
        opacity: 0;
        transform: rotate(-180deg) scale(0);
    }
    to {
        opacity: 1;
        transform: rotate(0) scale(1);
    }
}

.page-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
    animation: slideInLeft 0.6s ease 0.1s backwards;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 15px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    animation: slideInLeft 0.6s ease 0.2s backwards;
}

.breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-nav a:hover {
    color: #3b82f6;
}

.breadcrumb-nav span {
    color: rgba(255, 255, 255, 0.4);
}

/* Header Actions */
.header-actions {
    display: flex;
    gap: 12px;
    margin-top: 20px;
    animation: slideInLeft 0.6s ease 0.3s backwards;
}

.btn-header {
    padding: 12px 24px;
    border: none;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
}

.btn-back {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
}

.btn-back:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
    transform: translateX(-5px);
}

.btn-edit-header {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
}

.btn-edit-header:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(245, 158, 11, 0.5);
}

/* Detail Container */
.detail-container {
    padding: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Booking Code Card */
.booking-code-card {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(37, 99, 235, 0.05) 100%);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 25px;
    animation: zoomIn 0.6s ease;
    position: relative;
    overflow: hidden;
}

.booking-code-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.booking-code-content {
    position: relative;
    z-index: 1;
    text-align: center;
}

.booking-code-label {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.booking-code-value {
    font-family: 'Monaco', 'Courier New', monospace;
    font-size: 32px;
    color: #60a5fa;
    font-weight: 700;
    letter-spacing: 3px;
    margin-bottom: 15px;
    animation: slideInUp 0.6s ease 0.3s backwards;
}

.booking-code-icon {
    font-size: 48px;
    color: rgba(59, 130, 246, 0.3);
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Customer Info Card */
.customer-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 25px;
    animation: slideInRight 0.6s ease 0.2s backwards;
    transition: all 0.3s ease;
}

.customer-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.customer-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}

.customer-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    color: #3b82f6;
    letter-spacing: 2px;
    border: 3px solid rgba(59, 130, 246, 0.3);
    animation: scaleIn 0.6s ease 0.4s backwards;
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.customer-info h3 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0 0 5px 0;
    letter-spacing: 2px;
}

.customer-info p {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.5);
    margin: 0;
}

/* Detail Grid */
.detail-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

/* Info Card */
.info-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 35px;
    animation: fadeInUp 0.6s ease;
    transition: all 0.3s ease;
}

.info-card:hover {
    border-color: rgba(59, 130, 246, 0.3);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.info-card-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    color: #fff;
    margin: 0 0 25px 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.info-card-title i {
    color: #3b82f6;
    font-size: 28px;
    animation: pulse 2s ease-in-out infinite;
}

/* Info Items */
.info-grid {
    display: grid;
    gap: 20px;
}

.info-item {
    background: rgba(255, 255, 255, 0.03);
    padding: 20px;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    animation: fadeInLeft 0.6s ease;
    animation-fill-mode: backwards;
}

.info-item:nth-child(1) { animation-delay: 0.1s; }
.info-item:nth-child(2) { animation-delay: 0.2s; }
.info-item:nth-child(3) { animation-delay: 0.3s; }
.info-item:nth-child(4) { animation-delay: 0.4s; }

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.info-item:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(59, 130, 246, 0.2);
    transform: translateX(5px);
}

.info-label {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.info-label i {
    color: #3b82f6;
    font-size: 14px;
}

.info-value {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.95);
    font-weight: 500;
}

.info-value.large {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Movie Card */
.movie-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 0;
    overflow: hidden;
    animation: fadeInUp 0.6s ease 0.1s backwards;
    transition: all 0.3s ease;
}

.movie-card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
}

.movie-poster-container {
    width: 100%;
    height: 300px;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.movie-poster-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.movie-card:hover .movie-poster-image {
    transform: scale(1.1);
}

.movie-poster-container i {
    font-size: 80px;
    color: rgba(59, 130, 246, 0.5);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

.movie-info-content {
    padding: 25px;
}

.movie-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0 0 15px 0;
    letter-spacing: 2px;
    animation: slideInUp 0.6s ease 0.3s backwards;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.movie-meta {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.movie-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
    animation: fadeIn 0.6s ease;
    animation-fill-mode: backwards;
}

.movie-meta-item:nth-child(1) { animation-delay: 0.4s; }
.movie-meta-item:nth-child(2) { animation-delay: 0.5s; }
.movie-meta-item:nth-child(3) { animation-delay: 0.6s; }

.movie-meta-item i {
    color: #3b82f6;
    font-size: 16px;
}

/* Seat Visual */
.seat-visual {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 30px;
    margin-top: 25px;
    animation: zoomIn 0.6s ease 0.5s backwards;
}

.seat-visual-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    color: #fff;
    margin: 0 0 20px 0;
    letter-spacing: 2px;
    text-align: center;
}

.seat-display {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.seat-icon-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border: 3px solid rgba(59, 130, 246, 0.3);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 64px;
    color: #60a5fa;
    animation: swing 2s ease-in-out infinite;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2);
}

@keyframes swing {
    0%, 100% { transform: rotate(-5deg); }
    50% { transform: rotate(5deg); }
}

.seat-details {
    text-align: center;
}

.seat-number {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    color: #60a5fa;
    letter-spacing: 3px;
    margin: 0;
    animation: glow 2s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% {
        text-shadow: 0 0 10px rgba(96, 165, 250, 0.5),
                     0 0 20px rgba(96, 165, 250, 0.3);
    }
    50% {
        text-shadow: 0 0 20px rgba(96, 165, 250, 0.8),
                     0 0 30px rgba(96, 165, 250, 0.5),
                     0 0 40px rgba(96, 165, 250, 0.3);
    }
}

.seat-studio {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.6);
    margin: 5px 0 0 0;
}

/* Danger Zone */
.danger-zone {
    background: rgba(239, 68, 68, 0.05);
    border: 1px solid rgba(239, 68, 68, 0.2);
    border-radius: 16px;
    padding: 30px;
    margin-top: 25px;
    animation: fadeInUp 0.6s ease 0.7s backwards;
}

.danger-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    color: #ef4444;
    margin: 0 0 10px 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.danger-title i {
    font-size: 24px;
    animation: shake 1s ease-in-out infinite;
}

@keyframes shake {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(-5deg); }
    75% { transform: rotate(5deg); }
}

.danger-description {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0 0 20px 0;
    line-height: 1.6;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
}

/* Delete Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease;
}

.modal.show {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    max-width: 450px;
    width: 90%;
    animation: modalSlideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes modalSlideUp {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.modal-header {
    margin-bottom: 20px;
}

.modal-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    color: #fff;
    margin: 0;
    letter-spacing: 2px;
}

.modal-body {
    margin-bottom: 30px;
}

.modal-body p {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    line-height: 1.6;
}

.modal-body strong {
    color: #ef4444;
}

.modal-footer {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
}

.btn-cancel {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
    padding: 12px 24px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
}

.btn-confirm-delete {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border: none;
    color: #fff;
    padding: 12px 24px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-confirm-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

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
@media (max-width: 968px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-header {
        padding: 30px 20px;
    }
    
    .page-title {
        font-size: 32px;
    }
    
    .detail-container {
        padding: 20px;
    }
    
    .header-actions {
        flex-direction: column;
    }
    
    .btn-header {
        width: 100%;
        justify-content: center;
    }
    
    .customer-avatar {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">
            <i class="icofont icofont-eye"></i>
            Booking Seat Details
        </h1>
        <p class="page-subtitle">Complete information about this seat booking</p>
        <div class="breadcrumb-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.booking-seats.index') }}">Booking Seats</a>
            <span>/</span>
            <span>Details</span>
        </div>
        <div class="header-actions">
            <a href="{{ route('admin.booking-seats.index') }}" class="btn-header btn-back">
                <i class="icofont icofont-arrow-left"></i>
                Back to List
            </a>
            <a href="{{ route('admin.booking-seats.edit', $bookingSeat) }}" class="btn-header btn-edit-header">
                <i class="icofont icofont-edit"></i>
                Edit Booking
            </a>
        </div>
    </div>
</div>

<!-- Detail Container -->
<div class="detail-container">
    <!-- Booking Code Card -->
    <div class="booking-code-card">
        <div class="booking-code-content">
            <div class="booking-code-label">Booking Code</div>
            <div class="booking-code-value">{{ $bookingSeat->booking->booking_code }}</div>
            <div class="booking-code-icon">
                <i class="icofont icofont-barcode"></i>
            </div>
        </div>
    </div>

    <!-- Customer Info -->
    <div class="customer-card">
        <div class="customer-header">
            <div class="customer-avatar">
                {{ strtoupper(substr($bookingSeat->booking->user->name, 0, 2)) }}
            </div>
            <div class="customer-info">
                <h3>{{ $bookingSeat->booking->user->name }}</h3>
                <p>{{ $bookingSeat->booking->user->email }}</p>
            </div>
        </div>
    </div>

    <!-- Detail Grid -->
    <div class="detail-grid">
        <!-- Main Info Card -->
        <div class="info-card">
            <h3 class="info-card-title">
                <i class="icofont icofont-ui-calendar"></i>
                Booking Information
            </h3>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-film"></i>
                        Movie Title
                    </div>
                    <div class="info-value">{{ $bookingSeat->booking->schedule->movie->title }}</div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-building-alt"></i>
                        Studio
                    </div>
                    <div class="info-value">
                        {{ $bookingSeat->seat->studio->name }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-calendar"></i>
                        Show Date
                    </div>
                    <div class="info-value">
                        {{ \Carbon\Carbon::parse($bookingSeat->booking->schedule->show_date)->format('l, d F Y') }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="icofont icofont-clock-time"></i>
                        Show Time
                    </div>
                    <div class="info-value">
                        {{ \Carbon\Carbon::parse($bookingSeat->booking->schedule->show_time)->format('H:i') }} WIB
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Movie Card -->
        <div class="movie-card">
            <div class="movie-poster-container">
                @if($bookingSeat->booking->schedule->movie->poster)
                    <img src="{{ asset('storage/' . $bookingSeat->booking->schedule->movie->poster) }}" 
                         alt="{{ $bookingSeat->booking->schedule->movie->title }}" 
                         class="movie-poster-image">
                @else
                    <i class="icofont icofont-movie"></i>
                @endif
            </div>
            <div class="movie-info-content">
                <h3 class="movie-title">{{ $bookingSeat->booking->schedule->movie->title }}</h3>
                <div class="movie-meta">
                    <div class="movie-meta-item">
                        <i class="icofont icofont-listing-box"></i>
                        <span>{{ $bookingSeat->booking->schedule->movie->genre ?? 'Drama' }}</span>
                    </div>
                    <div class="movie-meta-item">
                        <i class="icofont icofont-clock-time"></i>
                        <span>{{ $bookingSeat->booking->schedule->movie->duration ?? '120' }} minutes</span>
                    </div>
                    <div class="movie-meta-item">
                        <i class="icofont icofont-star"></i>
                        <span>{{ $bookingSeat->booking->schedule->movie->rating ?? 'PG-13' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Seat Visual -->
    <div class="seat-visual">
        <h3 class="seat-visual-title">Seat Assignment</h3>
        <div class="seat-display">
            <div class="seat-icon-large">
                <i class="icofont icofont-seat"></i>
            </div>
            <div class="seat-details">
                <div class="seat-number">{{ $bookingSeat->seat->seat_code }}</div>
                <div class="seat-studio">{{ $bookingSeat->seat->studio->name }} - {{ ucfirst($bookingSeat->seat->type) }}</div>
            </div>
        </div>
    </div>
    
    <!-- Danger Zone -->
    <div class="danger-zone">
        <h3 class="danger-title">
            <i class="icofont icofont-warning-alt"></i>
            Danger Zone
        </h3>
        <p class="danger-description">
            Deleting this booking seat will permanently remove it from the system and release the seat. This action cannot be undone and may affect the customer's booking.
        </p>
        <button class="btn-danger" onclick="openDeleteModal()">
            <i class="icofont icofont-trash"></i>
            Delete Booking Seat
        </button>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Delete Booking Seat</h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this booking seat for <strong>{{ $bookingSeat->booking->schedule->movie->title }}</strong> - Seat <strong>{{ $bookingSeat->seat->seat_code }}</strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form action="{{ route('admin.booking-seats.destroy', $bookingSeat) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm-delete">Delete Booking Seat</button>
            </form>
        </div>
    </div>
</div>

<script>
// Delete modal functions
function openDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('show');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('show');
}

// Close modal on outside click
window.addEventListener('click', (e) => {
    const modal = document.getElementById('deleteModal');
    if (e.target === modal) {
        closeDeleteModal();
    }
});
</script>
@endsection