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
    color: #ef4444;
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
    color: #ef4444;
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
    color: #ef4444;
    font-size: 16px;
}

.required {
    color: #ef4444;
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
    border-color: rgba(239, 68, 68, 0.5);
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
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
    border-color: rgba(239, 68, 68, 0.5);
}

.file-upload-area.dragover {
    background: rgba(239, 68, 68, 0.1);
    border-color: #ef4444;
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
    color: #ef4444;
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
            <i class="icofont icofont-plus-circle"></i>
            Add New Movie
        </h1>
        <p class="page-subtitle">Create a new movie entry for your cinema</p>
        <div class="breadcrumb-nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.movies.index') }}">Movies</a>
            <span>/</span>
            <span>Add New</span>
        </div>
    </div>
</div>

<!-- Form Container -->
<div class="form-container">
    <div class="form-card">
        <form method="POST" action="{{ route('admin.movies.store') }}" enctype="multipart/form-data" id="movieForm">
            @csrf
            
            <div class="form-grid">
                <!-- Title -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="icofont icofont-film"></i>
                        Movie Title
                        <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           class="form-input" 
                           value="{{ old('title', $movie->title ?? '') }}" 
                           placeholder="Enter movie title"
                           required>
                    <span class="helper-text">
                        <i class="icofont icofont-info-circle"></i>
                        Enter the full title of the movie
                    </span>
                </div>

                <!-- Genre -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="icofont icofont-tags"></i>
                        Genre
                        <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="genre" 
                           class="form-input" 
                           value="{{ old('genre', $movie->genre ?? '') }}" 
                           placeholder="e.g., Action, Drama, Comedy"
                           required>
                </div>

                <!-- Duration -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="icofont icofont-clock-time"></i>
                        Duration (minutes)
                        <span class="required">*</span>
                    </label>
                    <input type="number" 
                           name="duration" 
                           class="form-input" 
                           value="{{ old('duration', $movie->duration ?? '') }}" 
                           placeholder="120"
                           min="1"
                           required>
                </div>

                <!-- Age Rating -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="icofont icofont-warning"></i>
                        Age Rating
                        <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="age_rating" 
                           class="form-input" 
                           value="{{ old('age_rating', $movie->age_rating ?? '') }}" 
                           placeholder="e.g., PG-13, R, G"
                           required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="icofont icofont-ui-settings"></i>
                        Status
                        <span class="required">*</span>
                    </label>
                    <select name="status" class="form-select" required>
                        <option value="now_showing" {{ old('status', $movie->status ?? '') == 'now_showing' ? 'selected' : '' }}>
                            Now Showing
                        </option>
                        <option value="coming_soon" {{ old('status', $movie->status ?? '') == 'coming_soon' ? 'selected' : '' }}>
                            Coming Soon
                        </option>
                        <option value="archived" {{ old('status', $movie->status ?? '') == 'archived' ? 'selected' : '' }}>
                            Archived
                        </option>
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="icofont icofont-file-text"></i>
                        Description
                        <span class="required">*</span>
                    </label>
                    <textarea name="description" 
                              class="form-textarea" 
                              placeholder="Enter movie description, synopsis, or plot summary..."
                              required>{{ old('description', $movie->description ?? '') }}</textarea>
                    <span class="helper-text">
                        <i class="icofont icofont-info-circle"></i>
                        Provide a brief synopsis of the movie
                    </span>
                </div>

                <!-- Poster Upload -->
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="icofont icofont-image"></i>
                        Movie Poster
                        <span class="required">*</span>
                    </label>
                    
                    <div class="file-upload-wrapper">
                        <div class="file-upload-area" id="fileUploadArea">
                            <input type="file" 
                                   name="poster" 
                                   class="file-input" 
                                   id="posterInput" 
                                   accept="image/*"
                                   required>
                            <div class="upload-icon">
                                <i class="icofont icofont-cloud-upload"></i>
                            </div>
                            <p class="upload-text">
                                <strong>Click to upload</strong> or drag and drop
                            </p>
                            <p class="upload-hint">
                                PNG, JPG, WEBP up to 5MB
                            </p>
                        </div>

                        <div class="image-preview-container" id="imagePreviewContainer">
                            <div class="image-preview-wrapper">
                                <img src="" alt="Preview" class="image-preview" id="imagePreview">
                                <button type="button" class="image-remove-btn" id="removeImageBtn">
                                    <i class="icofont icofont-close"></i>
                                </button>
                            </div>
                            <div class="image-info">
                                <span class="image-name" id="imageName"></span>
                                <span class="image-size" id="imageSize"></span>
                            </div>
                        </div>
                    </div>
                    
                    <span class="helper-text">
                        <i class="icofont icofont-info-circle"></i>
                        Recommended size: 600x900px (portrait orientation)
                    </span>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">
                    <i class="icofont icofont-close"></i>
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="icofont icofont-save"></i>
                    Save Movie
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// File Upload Handler
const fileUploadArea = document.getElementById('fileUploadArea');
const posterInput = document.getElementById('posterInput');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const imagePreview = document.getElementById('imagePreview');
const imageName = document.getElementById('imageName');
const imageSize = document.getElementById('imageSize');
const removeImageBtn = document.getElementById('removeImageBtn');

// Click to upload
fileUploadArea.addEventListener('click', () => {
    posterInput.click();
});

// File input change
posterInput.addEventListener('change', handleFileSelect);

// Drag and drop
fileUploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileUploadArea.classList.add('dragover');
});

fileUploadArea.addEventListener('dragleave', () => {
    fileUploadArea.classList.remove('dragover');
});

fileUploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    fileUploadArea.classList.remove('dragover');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        posterInput.files = files;
        handleFileSelect();
    }
});

// Handle file selection
function handleFileSelect() {
    const file = posterInput.files[0];
    
    if (file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file');
            return;
        }
        
        // Validate file size (5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('File size must be less than 5MB');
            return;
        }
        
        // Show preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imageName.textContent = file.name;
            imageSize.textContent = formatFileSize(file.size);
            
            fileUploadArea.style.display = 'none';
            imagePreviewContainer.classList.add('show');
        };
        reader.readAsDataURL(file);
    }
}

// Remove image
removeImageBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    posterInput.value = '';
    imagePreview.src = '';
    imageName.textContent = '';
    imageSize.textContent = '';
    
    fileUploadArea.style.display = 'block';
    imagePreviewContainer.classList.remove('show');
});

// Format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

// Form validation
const form = document.getElementById('movieForm');
form.addEventListener('submit', (e) => {
    const title = form.querySelector('[name="title"]').value.trim();
    const genre = form.querySelector('[name="genre"]').value.trim();
    const duration = form.querySelector('[name="duration"]').value;
    const ageRating = form.querySelector('[name="age_rating"]').value.trim();
    const description = form.querySelector('[name="description"]').value.trim();
    
    if (!title || !genre || !duration || !ageRating || !description) {
        e.preventDefault();
        alert('Please fill in all required fields');
        return;
    }
    
    if (!posterInput.files[0]) {
        e.preventDefault();
        alert('Please upload a movie poster');
        return;
    }
});
</script>
@endsection