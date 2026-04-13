@extends('layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #0a0a0a;
        color: #fff;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    /* Animated Background */
    .bg-animated {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
    }

    .bg-animated::before,
    .bg-animated::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        animation: float 20s infinite ease-in-out;
    }

    .bg-animated::before {
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(239, 68, 68, 0.15) 0%, transparent 70%);
        top: -200px;
        left: -200px;
        animation-delay: 0s;
    }

    .bg-animated::after {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(34, 197, 94, 0.1) 0%, transparent 70%);
        bottom: -150px;
        right: -150px;
        animation-delay: 10s;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0); }
        25% { transform: translate(100px, 100px); }
        50% { transform: translate(-50px, 150px); }
        75% { transform: translate(150px, -50px); }
    }

    .container {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 20px;
        max-width: 600px;
    }

    .maintenance-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 30px;
        padding: 60px 40px;
        animation: slideUp 0.8s ease;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .logo {
        width: 100px;
        height: 100px;
        margin: 0 auto 30px;
        font-size: 64px;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 30px rgba(239, 68, 68, 0.4);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 8px 30px rgba(239, 68, 68, 0.4);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 12px 40px rgba(239, 68, 68, 0.6);
        }
    }

    h1 {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 48px;
        margin: 30px 0 15px;
        letter-spacing: 2px;
        background: linear-gradient(135deg, #fff 0%, #ef4444 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .subtitle {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 40px;
        line-height: 1.6;
    }

    .feature-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin: 40px 0;
        text-align: left;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        background: rgba(34, 197, 94, 0.1);
        transform: translateX(5px);
    }

    .feature-icon {
        font-size: 24px;
    }

    .btn-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 40px;
    }

    .btn {
        padding: 16px 30px;
        border-radius: 12px;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(239, 68, 68, 0.5);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .status-badge {
        display: inline-block;
        background: rgba(34, 197, 94, 0.2);
        color: #22c55e;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .countdown {
        margin-top: 30px;
        padding: 20px;
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.2);
        border-radius: 12px;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
    }

    @media (max-width: 768px) {
        .maintenance-card {
            padding: 40px 20px;
        }

        h1 {
            font-size: 36px;
        }

        .subtitle {
            font-size: 14px;
        }
    }
</style>

<div class="bg-animated"></div>

<div class="container">
    <div class="maintenance-card">
        <div class="logo">
            🎬
        </div>

        <div class="status-badge">
            🔧 Maintenance
        </div>

        <h1>CineGo Mobile</h1>

        <p class="subtitle">
            Aplikasi web sedang dalam maintenance dan pengembangan. 
            Untuk pengalaman terbaik, gunakan aplikasi mobile kami!
        </p>

        <div class="feature-list">
            <div class="feature-item">
                <span class="feature-icon">📱</span>
                <div>Aplikasi Mobile dengan UI/UX terbaik</div>
            </div>
            <div class="feature-item">
                <span class="feature-icon">⚡</span>
                <div>Performa lebih cepat dan responsif</div>
            </div>
            <div class="feature-item">
                <span class="feature-icon">🔐</span>
                <div>Keamanan tingkat enterprise</div>
            </div>
            <div class="feature-item">
                <span class="feature-icon">💳</span>
                <div>Pembayaran yang aman dan mudah</div>
            </div>
        </div>

        <div class="btn-group">
            <a href="https://play.google.com/store/apps/details?id=com.cinego.mobile" 
               class="btn btn-primary" 
               target="_blank">
                📥 Download di Google Play
            </a>
            <a href="https://apps.apple.com/app/cinego" 
               class="btn btn-primary" 
               target="_blank">
                📥 Download di App Store
            </a>
            <a href="/" class="btn btn-secondary">
                🏠 Kembali ke Beranda
            </a>
        </div>

        <div class="countdown">
            <strong>ℹ️ Info:</strong> Aplikasi web akan kembali dalam kondisi baru dengan fitur yang lebih lengkap. 
            Terima kasih atas kesabarannya!
        </div>
    </div>
</div>
@endsection
