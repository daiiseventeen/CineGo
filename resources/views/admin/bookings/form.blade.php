<style>
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
        color: #ef4444;
        font-size: 16px;
    }

    .required {
        color: #ef4444;
        margin-left: 3px;
    }

    .form-control,
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

    .form-control:focus,
    .form-select:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(239, 68, 68, 0.5);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .form-control[readonly] {
        background: rgba(255, 255, 255, 0.02);
        cursor: not-allowed;
        opacity: 0.7;
    }

    .form-select {
        cursor: pointer;
    }

    .form-select option {
        background: #1a1a1a;
        color: #fff;
        padding: 10px;
    }

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

    .error-message {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #ef4444;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

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

    .btn-success {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
    }

    .btn-success:hover {
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
</style>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-user"></i>
        User
        <span class="required">*</span>
    </label>
    <select name="user_id" class="form-select" required>
        <option value="">-- Pilih User --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $booking->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Select the customer for this booking
    </span>
    @error('user_id')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-film"></i>
        Schedule / Film
        <span class="required">*</span>
    </label>
    <select name="schedule_id" id="scheduleSelect" class="form-select" required>
        <option value="">-- Pilih Film --</option>
        @foreach ($schedules as $schedule)
            <option value="{{ $schedule->id }}"
                data-price="{{ $schedule->price ?? 50000 }}"
                {{ old('schedule_id', $booking->schedule_id ?? '') == $schedule->id ? 'selected' : '' }}>
                {{ $schedule->movie->title }} —
                {{ \Carbon\Carbon::parse($schedule->show_date)->format('d M Y') }}
                {{ \Carbon\Carbon::parse($schedule->show_time)->format('H:i') }} —
                {{ $schedule->studio->name }} —
                Rp {{ number_format($schedule->price ?? 50000, 0, ',', '.') }}
            </option>
        @endforeach
    </select>
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Price will be automatically filled based on selected schedule
    </span>
    @error('schedule_id')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>

<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-money"></i>
        Total Harga
        <span class="required">*</span>
    </label>
    <input type="number" 
           class="form-control"
           id="totalPrice"
           value="{{ old('total_price', $booking->total_price ?? '') }}"
           placeholder="Select schedule to auto-fill price"
           readonly>
    <input type="hidden" 
           name="total_price" 
           id="totalPriceInput"
           value="{{ old('total_price', $booking->total_price ?? '') }}">
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Price is automatically set from selected schedule
    </span>
    @error('total_price')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>

@if(isset($booking))
<div class="form-group">
    <label class="form-label">
        <i class="icofont icofont-ui-settings"></i>
        Status
        <span class="required">*</span>
    </label>
    <select name="status" class="form-select" required>
        <option value="pending" {{ old('status', $booking->status ?? '') === 'pending' ? 'selected' : '' }}>
            Pending
        </option>
        <option value="paid" {{ old('status', $booking->status ?? '') === 'paid' ? 'selected' : '' }}>
            Paid
        </option>
        <option value="cancelled" {{ old('status', $booking->status ?? '') === 'cancelled' ? 'selected' : '' }}>
            Cancelled
        </option>
    </select>
    <span class="helper-text">
        <i class="icofont icofont-info-circle"></i>
        Update booking payment status
    </span>
    @error('status')
        <span class="error-message">
            <i class="icofont icofont-warning"></i>
            {{ $message }}
        </span>
    @enderror
</div>
@endif

<div class="form-actions">
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
        <i class="icofont icofont-close"></i>
        Kembali
    </a>
    <button type="submit" class="btn btn-success">
        <i class="icofont icofont-save"></i>
        Simpan
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const scheduleSelect = document.getElementById('scheduleSelect');
    const totalPriceDisplay = document.getElementById('totalPrice');
    const totalPriceInput = document.getElementById('totalPriceInput');

    if (scheduleSelect) {
        scheduleSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.dataset.price || '';
            
            if (price) {
                // Update both visible and hidden inputs
                totalPriceDisplay.value = price;
                totalPriceInput.value = price;
                
                // Visual feedback
                totalPriceDisplay.style.background = 'rgba(34, 197, 94, 0.1)';
                totalPriceDisplay.style.borderColor = 'rgba(34, 197, 94, 0.3)';
                
                // Reset after 2 seconds
                setTimeout(() => {
                    totalPriceDisplay.style.background = 'rgba(255, 255, 255, 0.05)';
                    totalPriceDisplay.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                }, 2000);
            } else {
                totalPriceDisplay.value = '';
                totalPriceInput.value = '';
            }
        });

        // Auto trigger on edit mode
        if (scheduleSelect.value) {
            scheduleSelect.dispatchEvent(new Event('change'));
        }
    }
});
</script>