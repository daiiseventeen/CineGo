<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'duration' => 'required|integer',
            'age_rating' => 'required',
            'description' => 'required',
            'status' => 'required|in:now_showing,coming_soon',
            'poster' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')
                ->store('movies', 'public');
        }

        Movie::create($data);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie berhasil ditambahkan');
    }

    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'duration' => 'required|integer',
            'age_rating' => 'required',
            'description' => 'required',
            'status' => 'required|in:now_showing,coming_soon',
            'poster' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }

            $data['poster'] = $request->file('poster')
                ->store('movies', 'public');
        }

        $movie->update($data);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie berhasil diupdate');
    }

    public function destroy(Movie $movie)
    {
        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }

        $movie->delete();
        return back()->with('success', 'Movie berhasil dihapus');
    }
}
