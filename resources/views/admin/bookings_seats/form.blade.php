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
        color: #8b5cf6;
        font-size: 16px;
    }

    .form-select {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(139, 92, 246, 0.5);
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
    }

    .form-select option {
        background: #1a1a1a;
        color: #fff;
    }

    /* Cinema Container */
    .cinema-container {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d1b2d 100%);
        border-radius: 16px;
        padding: 40px;
        margin: 30px 0;
        border: 1px solid rgba(139, 92, 246, 0.2);
    }

    .cinema-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 28px;
        color: #fff;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 2px;
    }

    /* Screen */
    .screen {
        background: linear-gradient(to bottom, #8b5cf6, #7c3aed);
        color: white;
        text-align: center;
        padding: 20px;
        margin-bottom: 40px;
        border-radius: 50% 50% 10% 10%;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 24px;
        letter-spacing: 3px;
        box-shadow: 0 10px 40px rgba(139, 92, 246, 0.3);
    }

    /* Legend */
    .legend {
        display: flex;
        gap: 30px;
        justify-content: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.7);
    }

    .legend-seat {
        width: 35px;
        height: 35px;
        border-radius: 6px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    /* Seats Grid */
    .seats-grid {
        display: grid;
        gap: 15px;
        padding: 30px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 12px;
    }

    .seat-row {
        display: flex;
        justify-content: center;
        gap: 12px;
        align-items: center;
    }

    .seat-label {
        width: 35px;
        text-align: right;
        font-family: 'Bebas Neue', sans-serif;
        color: #8b5cf6;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    /* Seats */
    .seat {
        width: 45px;
        height: 45px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px 8px 2px 2px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .seat::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 10%;
        right: 10%;
        height: 4px;
        background: currentColor;
        opacity: 0.5;
        border-radius: 0 0 2px 2px;
    }

    .seat.regular {
        background: linear-gradient(135deg, #2a9d8f 0%, #238a7e 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(42, 157, 143, 0.3);
    }

    .seat.vip {
        background: linear-gradient(135deg, #e76f51 0%, #d45f41 100%);
        color: white;
        box-shadow: 0 2px 8px rgba(231, 111, 81, 0.3);
    }

    .seat:hover:not(.booked) {
        transform: scale(1.15) translateY(-5px);
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.5);
        border-color: #8b5cf6;
        z-index: 10;
    }

    .seat.booked {
        background: linear-gradient(135deg, #444 0%, #333 100%);
        color: #666;
        cursor: not-allowed;
        border-color: #333;
        box-shadow: none;
    }

    .seat.booked::before {
        display: none;
    }

    .seat.selected {
        box-shadow: 0 0 25px rgba(251, 191, 36, 0.8), 0 0 50px rgba(251, 191, 36, 0.4);
        border-color: #fbbf24;
        transform: scale(1.2) translateY(-8px);
        z-index: 20;
    }

    .seat-input {
        display: none;
    }

    /* Selected Seats Display */
    .selected-seats {
        background: rgba(251, 191, 36, 0.1);
        border: 2px solid rgba(251, 191, 36, 0.3);
        padding: 20px;
        border-radius: 12px;
        margin-top: 30px;
    }

    .selected-seats-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 20px;
        color: #fbbf24;
        margin: 0 0 15px 0;
        letter-spacing: 2px;
    }

    .selected-seats-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .seat-badge {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #000;
        padding: 8px 18px;
        border-radius: 20px;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 18px;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(251, 191, 36, 0.3);
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

    .btn-success {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: white;
        box-shadow: 0 4px 20px rgba(139, 92, 246, 0.3);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(139, 92, 246, 0.5);
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
        <i class="icofont icofont-ticket"></i>
        Booking
        <span style="color: #8b5cf6;">*</span>
    </label>
    <select name="booking_id" id="bookingSelect" class="form-select" required>
        <option value="">-- Pilih Booking --</option>
        @foreach($bookings as $booking)
            <option value="{{ $booking->id }}"
                data-studio-id="{{ $booking->schedule->studio_id }}"
                {{ old('booking_id', $bookingSeat->booking_id ?? '') == $booking->id ? 'selected' : '' }}>
                {{ $booking->booking_code }} —
                {{ $booking->user->name }} —
                {{ $booking->schedule->movie->title }}
            </option>
        @endforeach
    </select>
</div>

<!-- Cinema Layout -->
<div class="cinema-container" id="cinemaContainer" style="display: none;">
    <h5 class="cinema-title">🎬 Select Your Seat 🎬</h5>
    
    <div class="legend">
        <div class="legend-item">
            <div class="legend-seat" style="background: linear-gradient(135deg, #2a9d8f 0%, #238a7e 100%);"></div>
            <span>Regular</span>
        </div>
        <div class="legend-item">
            <div class="legend-seat" style="background: linear-gradient(135deg, #e76f51 0%, #d45f41 100%);"></div>
            <span>VIP</span>
        </div>
        <div class="legend-item">
            <div class="legend-seat" style="background: linear-gradient(135deg, #444 0%, #333 100%); color: #666;"></div>
            <span>Booked</span>
        </div>
        <div class="legend-item">
            <div class="legend-seat" style="background: #fbbf24; box-shadow: 0 0 15px rgba(251,191,36,0.6);"></div>
            <span>Selected</span>
        </div>
    </div>

    <div class="screen">🎥 S C R E E N 🎥</div>

    @foreach($studios as $studio)
        <div id="studio-{{ $studio->id }}" class="seats-grid" style="display: none;">
            @php
                $seats = $studio->seats;
                $seatsPerRow = 10;
                $rows = ceil(count($seats) / $seatsPerRow);
                $seatIndex = 0;
            @endphp

            @for($row = 0; $row < $rows; $row++)
                <div class="seat-row">
                    <div class="seat-label">{{ chr(65 + $row) }}</div>
                    @for($col = 0; $col < $seatsPerRow; $col++)
                        @if($seatIndex < count($seats))
                            @php $seat = $seats[$seatIndex]; @endphp
                            <label class="seat {{ $seat->type }}" 
                                   id="seat-{{ $seat->id }}"
                                   data-seat-id="{{ $seat->id }}"
                                   data-seat-code="{{ $seat->seat_code }}">
                                <input type="radio" class="seat-input" 
                                       name="seat_id" 
                                       value="{{ $seat->id }}"
                                       @if(isset($bookingSeat) && $bookingSeat->seat_id === $seat->id) checked @endif>
                                {{ chr(65 + $row) }}{{ $col + 1 }}
                            </label>
                            @php $seatIndex++; @endphp
                        @endif
                    @endfor
                </div>
            @endfor
        </div>
    @endforeach
</div>

<div class="selected-seats" id="selectedSeats" style="display: none;">
    <h6 class="selected-seats-title">✓ Kursi yang dipilih:</h6>
    <div class="selected-seats-list" id="selectedSeatsList"></div>
</div>

<div class="form-actions">
    <a href="{{ route('admin.booking-seats.index') }}" class="btn btn-secondary">
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
    const bookingSelect = document.getElementById('bookingSelect');
    const cinemaContainer = document.getElementById('cinemaContainer');

    // Show/hide cinema based on booking selection
    bookingSelect.addEventListener('change', function() {
        const studioId = this.options[this.selectedIndex].dataset.studioId;
        
        if (studioId) {
            cinemaContainer.style.display = 'block';
            // Hide all studio grids
            document.querySelectorAll('[id^="studio-"]').forEach(el => el.style.display = 'none');
            // Show selected studio grid
            const studioGrid = document.getElementById(`studio-${studioId}`);
            if (studioGrid) {
                studioGrid.style.display = 'block';
            }
        } else {
            cinemaContainer.style.display = 'none';
        }
    });

    // Seat selection handler
    document.querySelectorAll('.seat').forEach(seatEl => {
        seatEl.addEventListener('click', function(e) {
            if (this.classList.contains('booked')) {
                e.preventDefault();
                return;
            }
            
            const radio = this.querySelector('input[type="radio"]');
            
            // Remove selected class from all seats
            document.querySelectorAll('.seat.selected').forEach(s => s.classList.remove('selected'));
            
            // Check the radio button and mark as selected
            radio.checked = true;
            this.classList.add('selected');
            
            updateSelectedSeats();
        });
    });

    // Update selected seats display
    function updateSelectedSeats() {
        const checked = document.querySelector('.seat-input:checked');
        const selectedContainer = document.getElementById('selectedSeats');
        const selectedList = document.getElementById('selectedSeatsList');
        
        if (checked) {
            const seatEl = checked.closest('.seat');
            const seatCode = seatEl.dataset.seatCode;
            selectedContainer.style.display = 'block';
            selectedList.innerHTML = `<span class="seat-badge">${seatCode}</span>`;
        } else {
            selectedContainer.style.display = 'none';
        }
    }

    // Initialize on page load
    if (bookingSelect.value) {
        bookingSelect.dispatchEvent(new Event('change'));
        updateSelectedSeats();
    }
});
</script>