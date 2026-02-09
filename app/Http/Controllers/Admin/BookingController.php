<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with([
                'user',
                'schedule.movie',
                'schedule.studio',
                'payment'
            ])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();

        $schedules = Schedule::with(['movie', 'studio'])
            ->orderBy('show_date')
            ->orderBy('show_time')
            ->get();

        return view('admin.bookings.create', compact('users', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // 🔐 Ambil harga resmi dari database
        $schedule = Schedule::with('movie')->findOrFail($request->schedule_id);

        Booking::create([
            'user_id'      => $request->user_id,
            'schedule_id'  => $schedule->id,
            'booking_code' => 'BK-' . strtoupper(Str::random(8)),
            'total_price'  => $schedule->movie->price,
            'status'       => 'pending',
        ]);

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking->load([
            'user',
            'schedule.movie',
            'schedule.studio',
            'bookingSeats.seat',
            'payment',
        ]);

        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $users = User::orderBy('name')->get();

        $schedules = Schedule::with(['movie', 'studio'])
            ->orderBy('show_date')
            ->orderBy('show_time')
            ->get();

        return view('admin.bookings.edit', compact('booking', 'users', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
            'status'      => 'required|in:pending,paid,cancelled',
        ]);

        $schedule = Schedule::with('movie')->findOrFail($request->schedule_id);

        $booking->update([
            'user_id'     => $request->user_id,
            'schedule_id' => $schedule->id,
            'total_price' => $schedule->movie->price,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // optional rule
        // if ($booking->status === 'paid') {
        //     return back()->with('error', 'Booking sudah dibayar tidak bisa dihapus');
        // }

        $booking->delete();

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }
}
