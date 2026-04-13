<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['booking'])->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::with(['user', 'schedule.movie'])->get();
        $bookingsData = $bookings->map(fn($b) => [
            'id' => $b->id,
            'booking_code' => $b->booking_code,
            'total_price' => $b->total_price,
            'user_name' => $b->user->name,
            'movie_title' => $b->schedule->movie->title,
        ])->toJson();
        return view('admin.payments.create', compact('bookings', 'bookingsData'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|in:credit_card,debit_card,bank_transfer,e_wallet',
            'payment_type' => 'required|in:full,installment',
            'payment_status' => 'required|in:pending,paid,failed,expired',
            'gross_amount' => 'required|numeric|min:0',
        ]);

        // Payment model akan auto-generate order_id, transaction_id, dan paid_at
        Payment::create($data);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment berhasil ditambahkan');
    }

    public function show(Payment $payment)
    {
        $payment->load(['booking']);
        return view('admin.payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $bookings = Booking::with(['user', 'schedule.movie'])->get();
        $bookingsData = $bookings->map(fn($b) => [
            'id' => $b->id,
            'booking_code' => $b->booking_code,
            'total_price' => $b->total_price,
            'user_name' => $b->user->name,
            'movie_title' => $b->schedule->movie->title,
        ])->toJson();
        $payment->load(['booking']);
        return view('admin.payments.edit', compact('payment', 'bookings', 'bookingsData'));
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|in:credit_card,debit_card,bank_transfer,e_wallet',
            'payment_type' => 'required|in:full,installment',
            'payment_status' => 'required|in:pending,paid,failed,expired',
            'gross_amount' => 'required|numeric|min:0',
        ]);

        // Payment model akan auto-generate paid_at ketika status = paid
        $payment->update($data);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment berhasil diupdate');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment berhasil dihapus');
    }
}
