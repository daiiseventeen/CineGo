<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingSeat;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Http\Request;

class BookingSeatController extends Controller
{
    public function index()
    {
        $bookingSeats = BookingSeat::with([
                'booking.user',
                'booking.schedule.movie',
                'seat.studio'
            ])
            ->latest()
            ->paginate(10);

        return view('admin.bookings_seats.index', compact('bookingSeats'));
    }

    public function create()
    {
        $bookings = Booking::with(['user', 'schedule.movie', 'bookingSeats.seat'])
            ->where('status', 'pending')
            ->get();

        $studios = Studio::with(['seats' => function($query) {
            $query->orderBy('seat_code');
        }])->get();

        return view('admin.bookings_seats.create', compact('bookings', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'seat_id'    => 'required|exists:seats,id',
        ]);

        // 🔒 Cegah kursi dobel
        $exists = BookingSeat::where('booking_id', $request->booking_id)
            ->where('seat_id', $request->seat_id)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['seat_id' => 'Kursi ini sudah dipilih untuk booking ini'])
                ->withInput();
        }

        BookingSeat::create($request->only('booking_id', 'seat_id'));

        return redirect()
            ->route('admin.booking-seats.index')
            ->with('success', 'Kursi berhasil ditambahkan ke booking');
    }

    public function show(BookingSeat $bookingSeat)
    {
        $bookingSeat->load([
            'booking.user',
            'booking.schedule.movie',
            'seat.studio'
        ]);

        return view('admin.bookings_seats.show', compact('bookingSeat'));
    }

    public function edit(BookingSeat $bookingSeat)
    {
        $bookingSeat->load('booking.schedule');
        
        $bookings = Booking::with(['user', 'schedule.movie', 'bookingSeats.seat'])->get();
        
        $studios = Studio::with(['seats' => function($query) {
            $query->orderBy('seat_code');
        }])->get();

        return view('admin.bookings_seats.edit', compact('bookingSeat', 'bookings', 'studios'));
    }

    public function update(Request $request, BookingSeat $bookingSeat)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'seat_id'    => 'required|exists:seats,id',
        ]);

        $exists = BookingSeat::where('booking_id', $request->booking_id)
            ->where('seat_id', $request->seat_id)
            ->where('id', '!=', $bookingSeat->id)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['seat_id' => 'Kursi ini sudah digunakan'])
                ->withInput();
        }

        $bookingSeat->update($request->only('booking_id', 'seat_id'));

        return redirect()
            ->route('admin.booking-seats.index')
            ->with('success', 'Booking seat berhasil diperbarui');
    }

    public function destroy(BookingSeat $bookingSeat)
    {
        $bookingSeat->delete();

        return redirect()
            ->route('admin.booking-seats.index')
            ->with('success', 'Booking seat berhasil dihapus');
    }
}
