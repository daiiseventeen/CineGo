<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua movie (dipakai di layout & dashboard)
        $movies = Movie::latest()->get();

        return view('admin.dashboard', compact('movies'));
    }
}
