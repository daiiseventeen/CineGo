@csrf

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-building-alt"></i>
        Studio
        <span class="required">*</span>
    </label>
    <select name="studio_id" class="form-select" required>
        <option value="">-- Select Studio --</option>
        @foreach ($studios as $studio)
            <option value="{{ $studio->id }}"
                {{ old('studio_id', $seat->studio_id ?? '') == $studio->id ? 'selected' : '' }}>
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
        Select the studio where this seat belongs
    </div>
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-seat"></i>
        Seat Code
        <span class="required">*</span>
    </label>
    <input type="text"
           name="seat_code"
           class="form-input"
           value="{{ old('seat_code', $seat->seat_code ?? '') }}"
           placeholder="e.g., A1, B5, C10"
           required>
    @error('seat_code')
        <div class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </div>
    @enderror
    <div class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Enter unique seat code (e.g., A1 for row A seat 1)
    </div>
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-ui-settings"></i>
        Seat Type
        <span class="required">*</span>
    </label>
    <select name="type" class="form-select" required>
        <option value="regular"
            {{ old('type', $seat->type ?? '') === 'regular' ? 'selected' : '' }}>
            Regular
        </option>
        <option value="vip"
            {{ old('type', $seat->type ?? '') === 'vip' ? 'selected' : '' }}>
            VIP
        </option>
    </select>
    @error('type')
        <div class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </div>
    @enderror
    <div class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Choose seat type: Regular for standard seats, VIP for premium seats
    </div>
</div>

<!-- Seat Preview -->
<div class="seat-preview">
    <div class="preview-title">
        <i class="icofont icofont-eye"></i>
        Seat Preview
    </div>
    <div class="preview-content">
        <div class="preview-item">
            <div class="preview-label">Studio</div>
            <div class="preview-value empty" id="previewStudio">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Seat Code</div>
            <div class="preview-value empty" id="previewSeatCode">-</div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Type</div>
            <div class="preview-value empty" id="previewType">-</div>
        </div>
    </div>
</div>

<!-- Form Actions -->
<div class="form-actions">
    <a href="{{ route('admin.seats.index') }}" class="btn btn-secondary">
        <i class="icofont icofont-close"></i>
        Cancel
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="icofont icofont-check"></i>
        {{ $button ?? 'Save Seat' }}
    </button>
</div>