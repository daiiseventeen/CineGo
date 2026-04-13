<?php

use App\Http\Controllers\Api\AuthController;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Studio;
use App\Models\Seat;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (NO AUTH REQUIRED)
|--------------------------------------------------------------------------
*/

// Auth Endpoints
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Movie Data
Route::get('/movies', function () {
    return response()->json([
        'data' => Movie::where('status', 'now_showing')->get(),
    ]);
});

Route::get('/movies/{movie}', function (Movie $movie) {
    return response()->json([
        'data' => $movie,
    ]);
});

// Public Schedule Data
Route::get('/schedules', function () {
    return response()->json([
        'data' => Schedule::with(['movie', 'studio'])->get(),
    ]);
});

Route::get('/schedules/{schedule}', function (Schedule $schedule) {
    return response()->json([
        'data' => $schedule->load(['movie', 'studio']),
    ]);
});

// Public Studio Data
Route::get('/studios', function () {
    return response()->json([
        'data' => Studio::all(),
    ]);
});

// Public Seats Data
Route::get('/seats/schedule/{schedule}', function (Schedule $schedule) {
    return response()->json([
        'data' => Seat::where('studio_id', $schedule->studio_id)
            ->with(['bookingSeats' => function ($query) use ($schedule) {
                $query->whereHas('booking', function ($q) use ($schedule) {
                    $q->where('schedule_id', $schedule->id);
                });
            }])
            ->get(),
    ]);
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (REQUIRE AUTHENTICATION)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    // User Profile
    Route::get('/me', fn (Request $request) => response()->json([
        'data' => $request->user(),
    ]));

    // Auth Endpoints
    Route::post('/logout', [AuthController::class, 'logout']);

    // User Bookings
    Route::get('/bookings', function (Request $request) {
        return response()->json([
            'data' => Booking::where('user_id', $request->user()->id)
                ->with(['schedule.movie', 'schedule.studio', 'bookingSeats.seat', 'payment'])
                ->get(),
        ]);
    });

    Route::get('/bookings/{booking}', function (Request $request, Booking $booking) {
        if ($booking->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'data' => $booking->load(['schedule.movie', 'schedule.studio', 'bookingSeats.seat', 'payment']),
        ]);
    });

    // Create Booking
    Route::post('/bookings', function (Request $request) {
        $validated = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_ids' => 'required|array|min:1',
            'seat_ids.*' => 'exists:seats,id',
        ]);

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'schedule_id' => $validated['schedule_id'],
            'booking_status' => 'pending',
        ]);

        // Create booking seats
        foreach ($validated['seat_ids'] as $seat_id) {
            $booking->bookingSeats()->create([
                'seat_id' => $seat_id,
            ]);
        }

        return response()->json([
            'message' => 'Booking berhasil dibuat',
            'data' => $booking->load('bookingSeats.seat'),
        ], 201);
    });

    // Payment endpoints
    Route::get('/payments/{booking}', function (Request $request, Booking $booking) {
        if ($booking->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'data' => Payment::where('booking_id', $booking->id)->first(),
        ]);
    });
});
