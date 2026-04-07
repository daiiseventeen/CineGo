<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::latest()->get();
        return view('admin.studios.index', compact('studios'));
    }

    public function create()
    {
        return view('admin.studios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_seat' => 'required|integer|min:1',
        ]);

        Studio::create($request->all());

        return redirect()
            ->route('admin.studios.index')
            ->with('success', 'Studio created successfully');
    }

    public function show(Studio $studio)
    {
        return view('admin.studios.show', compact('studio'));
    }

    public function edit(Studio $studio)
    {
        return view('admin.studios.edit', compact('studio'));
    }

    public function update(Request $request, Studio $studio)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_seat' => 'required|integer|min:1',
        ]);

        $studio->update($request->all());

        return redirect()
            ->route('admin.studios.index')
            ->with('success', 'Studio updated successfully');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();

        return redirect()
            ->route('admin.studios.index')
            ->with('success', 'Studio deleted successfully');
    }
}
