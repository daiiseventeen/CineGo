<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BookingSeatController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Auth Redirect Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return request()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/maintenance', fn () => view('user.maintenance'))->name('maintenance');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/home', fn () => view('home'))->name('home');
    Route::get('/nowplay', fn () => view('user.nowplay'))->name('nowplay');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Movies
        Route::resource('movies', MovieController::class);

        // Studios
        Route::resource('studios', StudioController::class);

        // Seats
        Route::resource('seats', SeatController::class);

        // Schedules
        Route::resource('schedules', ScheduleController::class);

        Route::resource('bookings', BookingController::class);

        Route::resource('booking-seats', BookingSeatController::class);

        Route::resource('payments', PaymentController::class);
    });

require __DIR__ . '/auth.php';
