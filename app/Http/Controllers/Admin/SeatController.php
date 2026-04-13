<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Studio;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index(Request $request)
    {
        // Get filter parameters
        $studioId = $request->query('studio_id');
        $limit = $request->query('limit', 25); // Default 25 seats
        
        // Get all studios for filter dropdown
        $studios = Studio::orderBy('name')->get();
        
        // Build query
        $query = Seat::with('studio')->orderBy('studio_id')->orderBy('seat_code');
        
        // Apply studio filter if selected
        if ($studioId) {
            $query->where('studio_id', $studioId);
        }
        
        // Apply limit
        $seats = $query->take($limit)->get();
        
        // Get total count for display info
        $totalSeats = Seat::when($studioId, fn($q) => $q->where('studio_id', $studioId))->count();
        $selectedStudio = $studioId ? Studio::find($studioId) : null;
        
        return view('admin.seats.index', compact('seats', 'studios', 'studioId', 'limit', 'totalSeats', 'selectedStudio'));
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
