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
        @error('title')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
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
        @error('genre')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
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
        @error('duration')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
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
        @error('age_rating')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
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
        @error('status')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
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
        @error('description')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Poster Upload -->
    <div class="form-group full-width">
        <label class="form-label">
            <i class="icofont icofont-image"></i>
            Movie Poster
            @if(!isset($movie) || !$movie->poster)
                <span class="required">*</span>
            @endif
        </label>
        
        <div class="file-upload-wrapper">
            <div class="file-upload-area" id="fileUploadArea">
                <input type="file" 
                       name="poster" 
                       class="file-input" 
                       id="posterInput" 
                       accept="image/*"
                       {{ (!isset($movie) || !$movie->poster) ? 'required' : '' }}>
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

            @if(isset($movie) && $movie->poster)
                <div class="current-poster">
                    <p class="helper-text" style="margin-bottom: 10px;">
                        <i class="icofont icofont-info-circle"></i>
                        Current poster:
                    </p>
                    <div class="image-preview-wrapper">
                        <img src="{{ asset('storage/' . $movie->poster) }}" alt="Current poster" class="image-preview">
                    </div>
                </div>
            @endif
        </div>
        
        <span class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Recommended size: 600x900px (portrait orientation)
        </span>
        @error('poster')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>
</div>

<script>
// File Upload Handler
document.addEventListener('DOMContentLoaded', function() {
    const fileUploadArea = document.getElementById('fileUploadArea');
    const posterInput = document.getElementById('posterInput');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const imageName = document.getElementById('imageName');
    const imageSize = document.getElementById('imageSize');
    const removeImageBtn = document.getElementById('removeImageBtn');

    if (!fileUploadArea || !posterInput) return;

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
                posterInput.value = '';
                return;
            }
            
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                posterInput.value = '';
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
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            posterInput.value = '';
            imagePreview.src = '';
            imageName.textContent = '';
            imageSize.textContent = '';
            
            fileUploadArea.style.display = 'block';
            imagePreviewContainer.classList.remove('show');
        });
    }

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }
});
</script>