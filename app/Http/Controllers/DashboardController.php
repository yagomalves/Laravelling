<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::with('ratings')->latest()->take(10)->get(); // ou o número que quiser

        return view('dashboard', compact('movies'));
    }
}
