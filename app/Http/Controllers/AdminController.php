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
        dd($styleSalle);
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
        'genre' => 'required|string',
        'acteur' => 'required|string',
        'date' => 'required|date',
        'salle_id' => 'required|exists:salles,id',
        'rating' => 'nullable|integer|min:1|max:5', 
        'length' => 'required|string',
        'presentation_time' => 'required|in:20h,23h',
        'description' => 'nullable|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $film = Film::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'acteur' => $request->acteur,
        'date' => $request->date,
        'salle_id' => $request->salle_id,
        'rating' => $request->rating,
        'length' => $request->length,
        'presentation_time' => $request->presentation_time,
        'description' => $request->description,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('images', 'public');

            Image::create([
                'film_id' => $film->id,
                'image' => $imagePath,
            ]);
        }
    }

    session()->flash('success', 'Film added successfully!');

    return redirect()->back();
}


public function statistiqueFilms(Request $request)
{

    $salles = Salle::all();
    dd($salles);
    $films = Film::whereHas('images')->where('statut', 1)->with('images')->get();
    $filmEdit = Film::where('id' ,$request->input('film_id') )->where('statut', 1)->with('images')->first();
    return view('admin.statistiqueFilms', [
        'salles' => $salles,
        'films' => $films,
        'filmEdit' => $filmEdit,
    ]);
}
public function deleteFilm($id)
{
    $film = Film::findOrFail($id);
    $film->statut = 0;
    $film->save();

    return redirect()->back();
}

public function updateMovie(Request $request)
{
    $filmId = $request->input('film_id');
    $film = Film::find($filmId);

    $film->title = $request->input('title');
    $film->genre = $request->input('genre');
    $film->acteur = $request->input('acteur');
    $film->date = $request->input('date');
    $film->salle_id = $request->input('salle_id');
    $film->rating = $request->input('rating');
    $film->length = $request->input('length');
    $film->presentation_time = $request->input('presentation_time');
    $film->description = $request->input('description');

    $film->save();

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('images', 'public');

            $existingImage = $film->images()->first();

            if ($existingImage) {
                $existingImage->update(['image' => $imagePath]);
            } else {
                Image::create([
                    'film_id' => $film->id,
                    'image' => $imagePath,
                ]);
            }
        }
    }

    return redirect('/statistiqueFilms')->with('success', 'Film updated successfully');
}




}
