<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        $movies = Movie::with('ratings')->take(5)->get();

        return view('dashboard', [
            'movies' => $movies->map(function ($movie) {
                return [
                    'title' => $movie->title,
                    'average_rating' => $movie->averageRating(),
                    'image' => asset('storage/' . $movie->image_path), // adapte conforme necessário
                ];
            })
        ]);
    }
}
