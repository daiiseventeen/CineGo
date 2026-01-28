@csrf

<div class="form-row">
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-movie"></i>
            Movie
            <span class="required">*</span>
        </label>
        <select name="movie_id" class="form-select" required>
            <option value="">- Select Movie -</option>
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}"
                    {{ old('movie_id', $schedule->movie_id ?? '') == $movie->id ? 'selected' : '' }}>
                    {{ $movie->title }}
                </option>
            @endforeach
        </select>
        @error('movie_id')
            <div class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </div>
        @enderror
        <div class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Select the movie to be screened
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-building-alt"></i>
            Studio
            <span class="required">*</span>
        </label>
        <select name="studio_id" class="form-select" required>
            <option value="">- Select Studio -</option>
            @foreach ($studios as $studio)
                <option value="{{ $studio->id }}"
                    {{ old('studio_id', $schedule->studio_id ?? '') == $studio->id ? 'selected' : '' }}>
                    {{ $studio->name }}
                </option>
            @endforeach
        </select>
        @error('studio_id')
            <div class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </div>
        @enderror
        <div class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Choose the screening studio
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-calendar"></i>
            Show Date
            <span class="required">*</span>
        </label>
        <input type="date" 
               name="show_date" 
               class="form-input"
               value="{{ old('show_date', $schedule->show_date ?? '') }}" 
               min="{{ date('Y-m-d') }}"
               required>
        @error('show_date')
            <div class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </div>
        @enderror
        <div class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Select the screening date
        </div>
    </div>

    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-clock-time"></i>
            Show Time
            <span class="required">*</span>
        </label>
        <input type="time" 
               name="show_time" 
               class="form-input"
               value="{{ old('show_time', $schedule->show_time ?? '') }}" 
               required>
        @error('show_time')
            <div class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </div>
        @enderror
        <div class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Set the screening time
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-cur-rupee"></i>
        Ticket Price
        <span class="required">*</span>
    </label>
    <input type="number" 
           name="price" 
           class="form-input"
           value="{{ old('price', $schedule->price ?? '') }}" 
           placeholder="e.g., 50000"
           min="0"
           step="1000"
           required>
    @error('price')
        <div class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </div>
    @enderror
    <div class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Enter ticket price in Rupiah (without dots or commas)
    </div>
</div>

<!-- Schedule Preview -->
<div class="schedule-preview">
    <div class="preview-title">
        <i class="icofont icofont-eye"></i>
        Schedule Preview
    </div>
    <div class="preview-content">
        <div class="preview-item">
            <div class="preview-label">Movie</div>
            <div class="preview-value empty" id="previewMovie">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Studio</div>
            <div class="preview-value empty" id="previewStudio">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Date</div>
            <div class="preview-value empty" id="previewDate">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Time</div>
            <div class="preview-value empty" id="previewTime">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Price</div>
            <div class="preview-value price empty" id="previewPrice">-</div>
        </div>
    </div>
</div>

<!-- Form Actions -->
<div class="form-actions">
    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">
        <i class="icofont icofont-close"></i>
        Cancel
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="icofont icofont-check"></i>
        {{ $buttonText ?? 'Save Schedule' }}
    </button>
</div>