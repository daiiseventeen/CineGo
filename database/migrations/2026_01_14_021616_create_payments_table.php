<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();

            // MIDTRANS CORE
            $table->string('order_id')->unique(); // booking_code biasanya
            $table->string('transaction_id')->nullable(); // dari midtrans
            $table->string('payment_method')->nullable(); // qris, bank_transfer, ewallet
            $table->string('payment_type')->nullable(); // midtrans payment_type
            $table->string('payment_status')->default('pending'); // pending, settlement, expire, cancel

            // NOMINAL
            $table->decimal('gross_amount', 12, 2);

            // RESPONSE MIDTRANS (FULL)
            $table->json('payload')->nullable();

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
