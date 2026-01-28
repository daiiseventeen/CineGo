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
    max-width: 900px;
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
    color: #3b82f6;
    font-size: 48px;
}

.page-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin: 0;
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
    max-width: 900px;
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
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group.full-width {
    grid-column: 1 / -1;
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

/* Date and Time Inputs */
.form-input[type="date"],
.form-input[type="time"] {
    color-scheme: dark;
}

.form-input[type="date"]::-webkit-calendar-picker-indicator,
.form-input[type="time"]::-webkit-calendar-picker-indicator {
    filter: invert(1);
    cursor: pointer;
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

/* Schedule Preview Card */
.schedule-preview {
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
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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

.preview-value.price {
    color: #10b981;
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
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: white;
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 30px rgba(59, 130, 246, 0.5);
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
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
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
            <i class="icofont icofont-plus-circle"></i>
            Add New Schedule
        </h1>
        <p class="page-subtitle">Create a new movie screening schedule</p>
        <div class="breadcrumb-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.schedules.index') }}">Schedules</a>
            <span>/</span>
            <span>Add New</span>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="form-container">
    <div class="form-card">
        <form action="{{ route('admin.schedules.store') }}" method="POST" id="scheduleForm">
            @csrf
            @include('admin.schedules.form', [
                'schedule' => null,
                'buttonText' => 'Create Schedule'
            ])
        </form>
    </div>
</div>

<script>
// Live Preview
const movieSelect = document.querySelector('[name="movie_id"]');
const studioSelect = document.querySelector('[name="studio_id"]');
const dateInput = document.querySelector('[name="show_date"]');
const timeInput = document.querySelector('[name="show_time"]');
const priceInput = document.querySelector('[name="price"]');

function updatePreview() {
    const previewMovie = document.getElementById('previewMovie');
    const previewStudio = document.getElementById('previewStudio');
    const previewDate = document.getElementById('previewDate');
    const previewTime = document.getElementById('previewTime');
    const previewPrice = document.getElementById('previewPrice');
    
    if (previewMovie) {
        const selectedMovie = movieSelect.options[movieSelect.selectedIndex];
        previewMovie.textContent = selectedMovie.value ? selectedMovie.text : '-';
        previewMovie.classList.toggle('empty', !selectedMovie.value);
    }
    
    if (previewStudio) {
        const selectedStudio = studioSelect.options[studioSelect.selectedIndex];
        previewStudio.textContent = selectedStudio.value ? selectedStudio.text : '-';
        previewStudio.classList.toggle('empty', !selectedStudio.value);
    }
    
    if (previewDate) {
        if (dateInput.value) {
            const date = new Date(dateInput.value);
            previewDate.textContent = date.toLocaleDateString('id-ID', { 
                day: 'numeric', 
                month: 'short', 
                year: 'numeric' 
            });
            previewDate.classList.remove('empty');
        } else {
            previewDate.textContent = '-';
            previewDate.classList.add('empty');
        }
    }
    
    if (previewTime) {
        previewTime.textContent = timeInput.value || '-';
        previewTime.classList.toggle('empty', !timeInput.value);
    }
    
    if (previewPrice) {
        if (priceInput.value) {
            previewPrice.textContent = 'Rp ' + parseInt(priceInput.value).toLocaleString('id-ID');
            previewPrice.classList.remove('empty');
        } else {
            previewPrice.textContent = '-';
            previewPrice.classList.add('empty');
        }
    }
}

movieSelect?.addEventListener('change', updatePreview);
studioSelect?.addEventListener('change', updatePreview);
dateInput?.addEventListener('change', updatePreview);
timeInput?.addEventListener('change', updatePreview);
priceInput?.addEventListener('input', updatePreview);

// Initial preview
document.addEventListener('DOMContentLoaded', updatePreview);
</script>
@endsection