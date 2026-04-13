<div class="form-grid">
    <!-- Booking -->
    <div class="form-group full-width">
        <label class="form-label">
            <i class="icofont icofont-book"></i>
            Booking
            <span class="required">*</span>
        </label>
        <select name="booking_id" id="bookingSelect" class="form-select" required data-bookings="{{ $bookingsData ?? '{}' }}">
            <option value="">-- Pilih Booking --</option>
            @foreach($bookings as $booking)
                <option value="{{ $booking->id }}" {{ old('booking_id', $payment->booking_id ?? '') == $booking->id ? 'selected' : '' }}>
                    {{ $booking->booking_code }} - {{ $booking->user->name }} - {{ $booking->schedule->movie->title }} (Rp {{ number_format($booking->total_price, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
        @error('booking_id')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Order ID -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-credit"></i>
            Order ID
            <span class="badge-auto">AUTO</span>
        </label>
        <div class="form-display">
            @if($payment?->order_id)
                <span class="display-value">{{ $payment->order_id }}</span>
            @else
                <span class="display-placeholder">Akan di-generate otomatis</span>
            @endif
        </div>
        <span class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Auto-generated saat ditambahkan (Format: ORD-YYYYMMDD-XXXXX)
        </span>
    </div>

    <!-- Transaction ID -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-hash"></i>
            Transaction ID
            <span class="badge-auto">AUTO</span>
        </label>
        <div class="form-display">
            @if($payment?->transaction_id)
                <span class="display-value">{{ $payment->transaction_id }}</span>
            @else
                <span class="display-placeholder">Akan di-generate otomatis</span>
            @endif
        </div>
        <span class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Auto-generated saat ditambahkan (Format: TRX-XXXXXXXX)
        </span>
    </div>

    <!-- Payment Method -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-credit"></i>
            Payment Method
            <span class="required">*</span>
        </label>
        <select name="payment_method" class="form-select" required>
            <option value="">-- Pilih Method --</option>
            <option value="credit_card" {{ old('payment_method', $payment->payment_method ?? '') == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
            <option value="debit_card" {{ old('payment_method', $payment->payment_method ?? '') == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
            <option value="bank_transfer" {{ old('payment_method', $payment->payment_method ?? '') == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
            <option value="e_wallet" {{ old('payment_method', $payment->payment_method ?? '') == 'e_wallet' ? 'selected' : '' }}>E-Wallet</option>
        </select>
        @error('payment_method')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Payment Type -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-calculator"></i>
            Payment Type
            <span class="required">*</span>
        </label>
        <select name="payment_type" class="form-select" required>
            <option value="">-- Pilih Tipe --</option>
            <option value="full" {{ old('payment_type', $payment->payment_type ?? '') == 'full' ? 'selected' : '' }}>Full</option>
            <option value="installment" {{ old('payment_type', $payment->payment_type ?? '') == 'installment' ? 'selected' : '' }}>Installment</option>
        </select>
        @error('payment_type')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Payment Status -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-check-alt"></i>
            Payment Status
            <span class="required">*</span>
        </label>
        <select name="payment_status" class="form-select" required>
            <option value="">-- Pilih Status --</option>
            <option value="pending" {{ old('payment_status', $payment->payment_status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ old('payment_status', $payment->payment_status ?? '') == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="failed" {{ old('payment_status', $payment->payment_status ?? '') == 'failed' ? 'selected' : '' }}>Failed</option>
            <option value="expired" {{ old('payment_status', $payment->payment_status ?? '') == 'expired' ? 'selected' : '' }}>Expired</option>
        </select>
        @error('payment_status')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Gross Amount -->
    <div class="form-group">
        <label class="form-label">
            <i class="icofont icofont-money"></i>
            Gross Amount
            <span class="required">*</span>
            <span class="badge-auto">AUTO</span>
        </label>
        <input type="number" 
               name="gross_amount" 
               class="form-input" 
               value="{{ old('gross_amount', $payment->gross_amount ?? '') }}" 
               placeholder="Otomatis dari booking yang dipilih"
               min="0"
               step="0.01"
               required>
        <span class="helper-text">
            <i class="icofont icofont-info-circle"></i>
            Otomatis terisi sesuai total harga booking saat dipilih
        </span>
        @error('gross_amount')
            <span class="error-message">
                <i class="icofont icofont-warning"></i>
                {{ $message }}
            </span>
        @enderror
    </div>

    <!-- Paid At -->
    <div class="form-group full-width">
        <label class="form-label">
            <i class="icofont icofont-calendar"></i>
            Paid At
            @if($payment?->payment_status === 'paid')
                <span class="badge-auto">AUTO</span>
            @endif
        </label>
        @if($payment?->payment_status === 'paid' && $payment?->paid_at)
            <div class="form-display">
                <span class="display-value">{{ $payment->paid_at->format('d M Y H:i') }}</span>
            </div>
            <span class="helper-text">
                <i class="icofont icofont-info-circle"></i>
                Otomatis diisi ketika status payment = "Paid"
            </span>
        @else
            <div class="form-display">
                <span class="display-placeholder">Akan di-isi otomatis saat status = "Paid"</span>
            </div>
            <span class="helper-text">
                <i class="icofont icofont-info-circle"></i>
                Sistem akan otomatis mengisi tanggal pembayaran
            </span>
        @endif
    </div>
</div>

<style>
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label i {
    font-size: 16px;
    color: #22c55e;
}

.required {
    color: #ef4444;
}

.badge-auto {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.1) 100%);
    border: 1px solid rgba(59, 130, 246, 0.3);
    color: #60a5fa;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-left: auto;
}

.form-input,
.form-select {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 12px 15px;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(34, 197, 94, 0.5);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

.form-select {
    cursor: pointer;
}

.form-select option {
    background: #1a1a1a;
    color: #fff;
}

/* Display Fields (Auto-generated) */
.form-display {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(37, 99, 235, 0.05) 100%);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 12px;
    padding: 12px 15px;
    display: flex;
    align-items: center;
    min-height: 44px;
}

.display-value {
    font-family: 'Courier New', monospace;
    font-size: 14px;
    color: #60a5fa;
    font-weight: 600;
    letter-spacing: 0.5px;
    word-break: break-all;
}

.display-placeholder {
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.4);
    font-style: italic;
}

.error-message {
    color: #ef4444;
    font-size: 12px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.helper-text {
    color: rgba(255, 255, 255, 0.45);
    font-size: 12px;
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-style: italic;
}

.helper-text i {
    font-size: 12px;
    color: rgba(59, 130, 246, 0.6);
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bookingSelect = document.getElementById('bookingSelect');
    const bookingsData = JSON.parse(bookingSelect.dataset.bookings || '{}');
    const grossAmountInput = document.querySelector('input[name="gross_amount"]');

    if (bookingSelect && grossAmountInput && bookingsData) {
        bookingSelect.addEventListener('change', function() {
            const selectedId = parseInt(this.value);
            if (selectedId) {
                // Find booking in data
                const bookingsArray = Object.values(bookingsData);
                const booking = bookingsArray.find(b => b.id === selectedId);
                
                if (booking) {
                    // Auto-fill gross amount
                    grossAmountInput.value = booking.total_price;
                    
                    // Add visual feedback
                    grossAmountInput.style.background = 'rgba(34, 197, 94, 0.1)';
                    grossAmountInput.style.borderColor = 'rgba(34, 197, 94, 0.5)';
                    
                    // Remove highlight after 2 seconds
                    setTimeout(() => {
                        const currentValue = document.querySelector('input[name="gross_amount"]').value;
                        if (currentValue == booking.total_price) {
                            grossAmountInput.style.background = 'rgba(255, 255, 255, 0.05)';
                            grossAmountInput.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                        }
                    }, 2000);
                    
                    // Scroll to amount field to show it
                    grossAmountInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });

        // Trigger change if booking is already selected (edit mode)
        if (bookingSelect.value) {
            bookingSelect.dispatchEvent(new Event('change'));
        }
    }
});
</script>
