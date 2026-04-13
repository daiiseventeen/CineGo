<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;

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

    /**
     * Boot untuk auto-generate Order ID & Transaction ID
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Auto-generate Order ID ketika create
         */
        static::creating(function ($model) {
            if (empty($model->order_id)) {
                // Format: ORD-20260413-XXXXX (5 digit random)
                $now = now();
                $random = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                $model->order_id = 'ORD-' . $now->format('Ymd') . '-' . $random;
            }

            if (empty($model->transaction_id)) {
                // Format: TRX-9a7b3f5e (UUID short)
                $model->transaction_id = 'TRX-' . substr(md5(uniqid()), 0, 8);
            }

            // Auto-set paid_at ketika status = paid
            if ($model->payment_status === 'paid' && empty($model->paid_at)) {
                $model->paid_at = now();
            }
        });

        /**
         * Auto update paid_at ketika status di-update ke paid
         */
        static::updating(function ($model) {
            if ($model->isDirty('payment_status') && $model->payment_status === 'paid' && empty($model->paid_at)) {
                $model->paid_at = now();
            }
        });
    }

    // 🔗 payments.booking_id → bookings.id
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
