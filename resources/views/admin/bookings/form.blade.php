<div class="mb-3">
    <label>User</label>
    <select name="user_id" class="form-control" required>
        <option value="">-- Pilih User --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                {{ old('user_id', $booking->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Schedule / Film</label>
    <select name="schedule_id" id="scheduleSelect" class="form-control" required>
        <option value="">-- Pilih Film --</option>
        @foreach ($schedules as $schedule)
            <option value="{{ $schedule->id }}"
                data-price="{{ $schedule->movie->price }}"
                {{ old('schedule_id', $booking->schedule_id ?? '') == $schedule->id ? 'selected' : '' }}>
                {{ $schedule->movie->title }} —
                {{ \Carbon\Carbon::parse($schedule->show_date)->format('d M Y') }}
                {{ \Carbon\Carbon::parse($schedule->show_time)->format('H:i') }} —
                {{ $schedule->studio->name }} —
                Rp {{ number_format($schedule->movie->price) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Total Harga</label>
    <input type="number" id="totalPrice" class="form-control"
           value="{{ old('total_price', $booking->total_price ?? '') }}"
           readonly>
</div>

@if(isset($booking))
<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="paid" {{ $booking->status === 'paid' ? 'selected' : '' }}>Paid</option>
        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>
</div>
@endif

<div class="d-flex gap-2">
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Kembali</a>
    <button class="btn btn-success">Simpan</button>
</div>

<script>
document.getElementById('scheduleSelect')?.addEventListener('change', function () {
    const price = this.options[this.selectedIndex].dataset.price || '';
    document.getElementById('totalPrice').value = price;
});

// auto trigger on edit
if (document.getElementById('scheduleSelect')?.value) {
    document.getElementById('scheduleSelect').dispatchEvent(new Event('change'));
}
</script>
