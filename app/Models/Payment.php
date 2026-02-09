<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'booking_id',
        'order_id',
        'transaction_id',
        'payment_method',
        'payment_type',
        'payment_status',
        'gross_amount',
        'payload',
        'paid_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'paid_at' => 'datetime',
    ];

    // 🔗 payments.booking_id → bookings.id
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
