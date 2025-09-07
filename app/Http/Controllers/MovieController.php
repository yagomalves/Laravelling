<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\Category;

class MovieController extends Controller
{


    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    public function index()
    {
        $movies = Movie::with(['categories', 'comments', 'ratings'])->get();
        

        return view('movies.index', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');
        $movie->image_path = $request->file('image') ? $request->file('image')->store('movies', 'public') : null;
        $movie->created_by = $request->user()->id;

        $movie->save();

        if ($request->has('categories')) 
        {
        $movie->categories()->attach($request->input('categories')); // array de IDs
        }

        return redirect()->route('movies.index');

    }


    public function edit($id)
    {
        $movie = Movie::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');
        if ($request->hasFile('image')) 
            {
            $movie->image_path = $request->file('image')->store('movies', 'public');
            }
        $movie->updated_at = now();
        $movie->save();

        $movie->categories()->sync($request->input('categories', []));
        
        return redirect()->route('movies.index');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index');
    }



    public function rating(Request $request, $id)
    {
        $rating = new Rating();
        $rating->user_id = $request->user()->id;
        $rating->movie_id = $id;
        $rating->rating = $request->input('rating');

        $rating->save();

        return redirect()->route('movies.index');
    }

}
