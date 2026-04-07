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
}

.page-header-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
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
}

.page-title i {
    color: #f59e0b;
    font-size: 48px;
}

.page-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
}

.seat-info-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(245, 158, 11, 0.15);
    border: 1px solid rgba(245, 158, 11, 0.3);
    padding: 8px 16px;
    border-radius: 50px;
    margin-top: 12px;
}

.seat-info-badge i {
    color: #f59e0b;
    font-size: 18px;
}

.seat-info-badge span {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

.seat-info-badge strong {
    color: #fbbf24;
    font-weight: 600;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 15px;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
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

/* Form Container */
.form-container {
    padding: 40px;
    max-width: 800px;
    margin: 0 auto;
}

.form-card {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 40px;
    animation: fadeInUp 0.6s ease;
}

/* Form Groups */
.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.8);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label i {
    color: #3b82f6;
    font-size: 16px;
}

.required {
    color: #3b82f6;
    margin-left: 3px;
}

/* Input Styles */
.form-input,
.form-select {
    width: 100%;
    padding: 14px 18px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.5)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 20px;
    padding-right: 45px;
}

.form-select option {
    background: #1a1a1a;
    color: #fff;
    padding: 10px;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(59, 130, 246, 0.5);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-input::placeholder {
    color: rgba(255, 255, 255, 0.3);
}

/* Helper Text */
.helper-text {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.4);
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.helper-text i {
    font-size: 14px;
}

/* Error Messages */
.error-message {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: #ef4444;
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.error-message i {
    font-size: 14px;
}

/* Seat Preview Card */
.seat-preview {
    background: rgba(59, 130, 246, 0.05);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 25px;
    margin-top: 30px;
}

.preview-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 20px;
    color: #3b82f6;
    margin: 0 0 15px 0;
    letter-spacing: 2px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.preview-title i {
    font-size: 24px;
}

.preview-content {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
}

.preview-item {
    background: rgba(255, 255, 255, 0.03);
    padding: 15px;
    border-radius: 8px;
}

.preview-label {
    font-family: 'Poppins', sans-serif;
    font-size: 11px;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.preview-value {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    color: #fff;
    letter-spacing: 1px;
}

.preview-value.empty {
    color: rgba(255, 255, 255, 0.3);
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    margin-top: 30px;
}

.btn {
    padding: 14px 32px;
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

.btn-primary {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(245, 158, 11, 0.5);
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.7);
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
}

/* Warning Alert */
.warning-alert {
    background: rgba(245, 158, 11, 0.1);
    border: 1px solid rgba(245, 158, 11, 0.3);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 25px;
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.warning-alert i {
    color: #fbbf24;
    font-size: 24px;
    flex-shrink: 0;
    margin-top: 2px;
}

.warning-alert-content h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #fbbf24;
    margin: 0 0 5px 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.warning-alert-content p {
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
    line-height: 1.5;
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
    .page-header {
        padding: 30px 20px;
    }
    
    .page-title {
        font-size: 32px;
    }
    
    .form-container {
        padding: 20px;
    }
    
    .form-card {
        padding: 25px;
    }
    
    .preview-content {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column-reverse;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1 class="page-title">
            <i class="icofont icofont-edit"></i>
            Edit Seat
        </h1>
        <p class="page-subtitle">Update seat configuration and details</p>
        <div class="seat-info-badge">
            <i class="icofont icofont-ui-pointer"></i>
            <span>Editing: <strong>{{ $seat->seat_code }}</strong></span>
        </div>
        <div class="breadcrumb-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.seats.index') }}">Seats</a>
            <span>/</span>
            <span>Edit</span>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="form-container">
    <div class="form-card">
        <!-- Warning Alert -->
        <div class="warning-alert">
            <i class="icofont icofont-warning-alt"></i>
            <div class="warning-alert-content">
                <h4>Update Warning</h4>
                <p>Changing seat information may affect existing bookings. Please ensure all details are correct before updating.</p>
            </div>
        </div>

        <form action="{{ route('admin.seats.update', $seat) }}" method="POST" id="seatForm">
            @csrf
            @method('PUT')
            @include('admin.seats.form', [
                'seat' => $seat,
                'button' => 'Update Seat'
            ])
        </form>
    </div>
</div>

<script>
// Live Preview
const studioSelect = document.querySelector('[name="studio_id"]');
const seatCodeInput = document.querySelector('[name="seat_code"]');
const typeSelect = document.querySelector('[name="type"]');

function updatePreview() {
    const previewStudio = document.getElementById('previewStudio');
    const previewSeatCode = document.getElementById('previewSeatCode');
    const previewType = document.getElementById('previewType');
    
    if (previewStudio) {
        const selectedStudio = studioSelect.options[studioSelect.selectedIndex];
        previewStudio.textContent = selectedStudio.value ? selectedStudio.text : '-';
        previewStudio.classList.toggle('empty', !selectedStudio.value);
    }
    
    if (previewSeatCode) {
        previewSeatCode.textContent = seatCodeInput.value || '-';
        previewSeatCode.classList.toggle('empty', !seatCodeInput.value);
    }
    
    if (previewType) {
        previewType.textContent = typeSelect.value ? typeSelect.options[typeSelect.selectedIndex].text : '-';
        previewType.classList.toggle('empty', !typeSelect.value);
    }
}

studioSelect?.addEventListener('change', updatePreview);
seatCodeInput?.addEventListener('input', updatePreview);
typeSelect?.addEventListener('change', updatePreview);

// Initial preview
document.addEventListener('DOMContentLoaded', updatePreview);
</script>
@endsection