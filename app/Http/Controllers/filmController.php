<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\images;

class filmController extends Controller
{
    public function showFilm($id){
        $film = Film::findOrFail($id); 
        $images = images::where('film_id', $id)->get();
        return view('user.film',compact('film','images'));
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
