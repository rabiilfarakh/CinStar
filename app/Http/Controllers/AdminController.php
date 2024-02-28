<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\chaises;
class AdminController extends Controller
{
    public function insertSchema(Request $request){
        
        $request->validate([
            'salle_id' => 'required|exists:salles,id',
            'chaises' => 'required|array',
        ]);

        $chaises = $request->input('chaises');

        Chaises::where('salle_id', $request->salle_id)
              ->whereIn('number', $chaises)
              ->update(['display' => 'block']);

        Chaises::where('salle_id', $request->salle_id)
              ->whereNotIn('number', $chaises)
              ->update(['display' => 'none']);

            return redirect()->back();
    }
    

    public function schemaSalle(Request $request){
        
        $salles = Salle::all();
        $film = Film::all();
        $styleSalle = $request->input('style', []);
       
    }

    public function dashboard()
    {

        $salles = Salle::all();
        return view('admin.dashboard', ['salles' => $salles]);
    }



    public function insertFilm(){
        $salles = Salle::all();
        $film = Film::all();
        return view('admin.insertFilms', compact('salles', 'film'));
    }

    public function manageDash($id){
        $salles = Salle::all();
        $salle = Salle::findOrFail($id);
        $films = Film::where("salle_id", $id)->get();
    
        return view('admin.manageShemas', compact('salles','salle', 'films'));
    }
    

    public function storeFilm(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'year' => 'required|string',
        'runtime' => 'required|string',
        'genre' => 'required|string',
        'type' => 'required|string',
        'released' => 'required|string',
        'Awards' => 'required|string',
        'acteur' => 'required|string',
        'description' => 'nullable|string',
        'images.*' => 'required',
    ]);

    $film = Film::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'year' => $request->year,
        'type' => $request->type,
        'released' => $request->released,
        'Awards' => $request->Awards,
        'acteur' => $request->acteur,
        'runtime' => $request->runtime,
        'Poster' => $request->Poster,
        'description' => $request->description,
    ]);

    if ($request->has('images')) {
        foreach ($request->input('images') as $imageUrl) {
            Image::create([
                'film_id' => $film->id,
                'image' => $imageUrl,
            ]);
        }
    }
    

    session()->flash('success', 'Film added successfully!');

    return redirect()->back();
}


public function statistiqueFilms(Request $request)
{
    $salles = Salle::all();

    $films = Film::where('statut', '!=', 0)->get();
    $filmEdit = Film::where('id' ,$request->input('film_id'))->first();

    return view('admin.statistiqueFilms', [
        'films' => $films,
        'salles' => $salles,
        'filmEdit' => $filmEdit,

    ]);
}


public function deleteFilm($id)
{
    $film = Film::findOrFail($id);
    $film->delete();

    return redirect('/statistiqueFilms');
}


public function updateMovie(Request $request)
{
    $filmId = $request->input('film_id');
    $film = Film::find($filmId);

    $film->title = $request->input('title');
    $film->genre = $request->input('genre');
    $film->year = $request->input('year');
    $film->type = $request->input('type');
    $film->released = $request->input('released');
    $film->Awards = $request->input('Awards');
    $film->acteur = $request->input('acteur');
    $film->runtime = $request->input('runtime');
    $film->Poster = $request->input('Poster');
    $film->description = $request->input('description');

    $film->save();


    return redirect('/statistiqueFilms')->with('success', 'Film updated successfully');
}



public function updateMovieWeek(Request $request)
{
    $request->validate([
        'film_id' => 'required|exists:films,id',
        'presentation_time' => 'required|string',
        'salle_id' => 'required|exists:salles,id',
        'date' => 'required|string',
    ]);

    $filmId = $request->input('film_id');
    $film = Film::find($filmId);

    $film->presentation_time = $request->input('presentation_time');
    $film->salle_id = $request->input('salle_id');
    $film->date = $request->input('date'); 
    $film->statut = 2;

    $film->save();

    return redirect('/statistiqueFilms')->with('success', 'You added the film of the week successfully');
}



}
