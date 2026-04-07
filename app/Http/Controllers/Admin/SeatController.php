<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('studio')->orderBy('studio_id')->get();
        return view('admin.seats.index', compact('seats'));
    }

    public function create()
    {
        $studios = Studio::all();
        return view('admin.seats.create', compact('studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'studio_id' => 'required|exists:studios,id',
            'seat_code' => 'required|string|max:10',
            'type' => 'required|in:regular,vip',
        ]);

        Seat::create($request->all());

        return redirect()
            ->route('admin.seats.index')
            ->with('success', 'Seat created successfully');
    }

    public function show(Seat $seat)
    {
        return view('admin.seats.show', compact('seat'));
    }

    public function edit(Seat $seat)
    {
        $studios = Studio::all();
        return view('admin.seats.edit', compact('seat', 'studios'));
    }

    public function update(Request $request, Seat $seat)
    {
        $request->validate([
            'studio_id' => 'required|exists:studios,id',
            'seat_code' => 'required|string|max:10',
            'type' => 'required|in:regular,vip',
        ]);

        $seat->update($request->all());

        return redirect()
            ->route('admin.seats.index')
            ->with('success', 'Seat updated successfully');
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();

        return redirect()
            ->route('admin.seats.index')
            ->with('success', 'Seat deleted successfully');
    }
}
