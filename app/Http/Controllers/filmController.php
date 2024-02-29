<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Image;


class filmController extends Controller
{
    public function showFilm($slug){
        $film = Film::where('slug', $slug)->firstOrFail(); 
        $movie = Film::with('images')->where('slug', $slug)->first();
        return view('user.film', compact('movie'));
    }
    public function store(Request $request) {

        $film = new Film();

        $film->title = $request->Title;
        $film->year = $request->Year;
        $film->runtime = $request->Runtime;
        $film->released = $request->Released;
        $film->Awards = $request->Awards;
        $film->genre = $request->genre;
        $film->acteur = $request->Actors;
        $film->rating = $request->Rated;

        $film->save();

        return response()->json(['message' => 'Post created successfully'], 201);

    }
}
