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
        radial-gradient(circle at 20% 50%, rgba(239, 68, 68, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(239, 68, 68, 0.1) 0%, transparent 50%);
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
    color: #f59e0b;
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
    color: #f59e0b;
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

/* Form Layout */
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 10px;
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
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label i {
    color: #f59e0b;
    font-size: 16px;
}

.required {
    color: #f59e0b;
    margin-left: 3px;
}

/* Input Styles */
.form-input,
.form-select,
.form-textarea {
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

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(245, 158, 11, 0.5);
    box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: rgba(255, 255, 255, 0.3);
}

.form-select {
    cursor: pointer;
}

.form-select option {
    background: #1a1a1a;
    color: #fff;
    padding: 10px;
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
}

/* File Upload */
.file-upload-wrapper {
    position: relative;
}

.file-upload-area {
    width: 100%;
    padding: 40px;
    background: rgba(255, 255, 255, 0.03);
    border: 2px dashed rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.file-upload-area:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(245, 158, 11, 0.5);
}

.file-upload-area.dragover {
    background: rgba(245, 158, 11, 0.1);
    border-color: #f59e0b;
}

.file-input {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

.upload-icon {
    font-size: 48px;
    color: rgba(255, 255, 255, 0.3);
    margin-bottom: 15px;
}

.upload-text {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 8px;
}

.upload-text strong {
    color: #f59e0b;
}

.upload-hint {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.4);
}

/* Image Preview */
.image-preview-container {
    display: none;
    margin-top: 20px;
    position: relative;
}

.image-preview-container.show {
    display: block;
}

.current-poster {
    margin-top: 20px;
}

.image-preview-wrapper {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.image-preview {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
}

.image-remove-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 40px;
    height: 40px;
    background: rgba(239, 68, 68, 0.9);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.image-remove-btn:hover {
    background: #ef4444;
    transform: scale(1.1);
}

.image-info {
    padding: 15px;
    background: rgba(255, 255, 255, 0.03);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.6);
}

.image-name {
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
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

.btn-warning {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
}

.btn-warning:hover {
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
    
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
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
            Edit Movie
        </h1>
        <p class="page-subtitle">Update movie information - {{ $movie->title }}</p>
        <div class="breadcrumb-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.movies.index') }}">Movies</a>
            <span>/</span>
            <span>Edit</span>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="form-container">
    <div class="form-card">
        <form method="POST" action="{{ route('admin.movies.update', $movie) }}" enctype="multipart/form-data" id="movieForm">
            @csrf
            @method('PUT')
            
            @include('admin.movies.form')

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">
                    <i class="icofont icofont-close"></i>
                    Cancel
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="icofont icofont-save"></i>
                    Update Movie
                </button>
            </div>
        </form>
    </div>
</div>
@endsection