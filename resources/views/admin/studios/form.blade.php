@csrf

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-architecture-alt"></i>
        Studio Name
        <span class="required">*</span>
    </label>
    <input
        type="text"
        name="name"
        class="form-input"
        value="{{ old('name', $studio->name ?? '') }}"
        placeholder="Enter studio name (e.g., Studio A, Hall 1)"
        required
    >
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Enter a unique name for this cinema studio
    </span>
    @error('name')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-seat"></i>
        Total Seats
        <span class="required">*</span>
    </label>
    <input
        type="number"
        name="total_seat"
        class="form-input"
        min="1"
        max="1000"
        value="{{ old('total_seat', $studio->total_seat ?? '') }}"
        placeholder="Enter total number of seats"
        required
    >
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Enter the seating capacity of this studio (1-1000 seats)
    </span>
    @error('total_seat')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>

<!-- Live Preview Card -->
<div class="studio-preview">
    <h3 class="preview-title">
        <i class="icofont icofont-eye"></i>
        Live Preview
    </h3>
    <div class="preview-content">
        <div class="preview-item">
            <div class="preview-label">Studio Name</div>
            <div class="preview-value {{ (old('name', $studio->name ?? '') ? '' : 'empty') }}" id="previewName">
                {{ old('name', $studio->name ?? 'Studio Name') }}
            </div>
        </div>
        <div class="preview-item">
            <div class="preview-label">Total Seats</div>
            <div class="preview-value {{ (old('total_seat', $studio->total_seat ?? '') ? '' : 'empty') }}" id="previewSeats">
                {{ old('total_seat', $studio->total_seat ?? '0') }}
            </div>
        </div>
    </div>
</div>

<!-- Form Actions -->
<div class="form-actions">
    <a href="{{ route('admin.studios.index') }}" class="btn btn-secondary">
        <i class="icofont icofont-close"></i>
        Cancel
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="icofont icofont-save"></i>
        {{ $buttonText ?? 'Save Studio' }}
    </button>
</div>

<script>
// Live preview functionality
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('input[name="name"]');
    const seatInput = document.querySelector('input[name="total_seat"]');
    const previewName = document.getElementById('previewName');
    const previewSeats = document.getElementById('previewSeats');

    if (nameInput && previewName) {
        nameInput.addEventListener('input', function() {
            previewName.textContent = this.value || 'Studio Name';
            previewName.classList.toggle('empty', !this.value);
        });
    }

    if (seatInput && previewSeats) {
        seatInput.addEventListener('input', function() {
            previewSeats.textContent = this.value || '0';
            previewSeats.classList.toggle('empty', !this.value);
        });
    }

    // Form validation
    const form = document.getElementById('studioForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const name = nameInput?.value.trim();
            const seats = parseInt(seatInput?.value);
            
            if (!name) {
                e.preventDefault();
                alert('Please enter studio name');
                nameInput?.focus();
                return;
            }
            
            if (!seats || seats < 1) {
                e.preventDefault();
                alert('Please enter valid number of seats (minimum 1)');
                seatInput?.focus();
                return;
            }
        });
    }
});
</script>