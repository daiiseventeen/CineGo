<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Studio;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['movie', 'studio'])->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $movies  = Movie::all();
        $studios = Studio::all();
        return view('admin.schedules.create', compact('movies', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id'  => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'price'     => 'required|integer',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule berhasil ditambahkan');
    }

    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $movies  = Movie::all();
        $studios = Studio::all();
        return view('admin.schedules.edit', compact('schedule', 'movies', 'studios'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'movie_id'  => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'show_date' => 'required|date',
            'show_time' => 'required',
            'price'     => 'required|integer',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule berhasil diupdate');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Schedule berhasil dihapus');
    }
}
