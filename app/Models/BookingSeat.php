<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSeat extends Model
{
    use HasFactory;

    protected $table = 'booking_seats';

    protected $fillable = [
        'booking_id',
        'seat_id',
    ];

    // 🔗 booking_seats.booking_id → bookings.id
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // 🔗 booking_seats.seat_id → seats.id
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
}
