@extends('layouts.user')

@section('content')
<!-- Placeholder untuk Transaksi User -->
<div class="content-header">
    <h1>
        <i class="icofont icofont-ticket"></i>
        Data Pemesanan Saya
    </h1>
</div>

<div class="section-card">
    <h2 class="section-title">
        <i class="icofont icofont-history"></i>
        Riwayat Pemesanan
    </h2>
    
    <div style="text-align: center; padding: 60px 20px; color: #999;">
        <i class="icofont icofont-empty-box" style="font-size: 48px; margin-bottom: 20px; display: block; opacity: 0.5;"></i>
        <p style="font-size: 16px; margin-bottom: 10px;">Belum ada pemesanan</p>
        <p style="font-size: 13px;">Lakukan pemesanan tiket film di halaman sebelumnya</p>
    </div>
</div>
@endsection
