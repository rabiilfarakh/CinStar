<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
use App\Models\Image;
use Illuminate\Http\Request;
class AdminController extends Controller
{

    public function dashboard()
    {

        $salles = Salle::all();
        return view('admin.dashboard', ['salles' => $salles]);
    }

    public function insertFilm(){
        $salles = Salle::all();
        $film = Film::all();
  
        return view('admin.dashboard', compact('salles', 'film'));
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
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $film = Film::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'acteur' => $request->acteur,
        'date' => $request->date,
        'salle_id' => $request->salle_id,
        'rating' => $request->rating, 
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

    return redirect()->back();
}
public function statistiqueFilms()
{
    $salles = Salle::all();
    $films = Film::whereHas('images')->where('statut', 1)->with('images')->get();
    return view('admin.statistiqueFilms', compact('films', 'salles'));
}
public function deleteFilm($id)
{
    $film = Film::findOrFail($id);
    $film->statut = 0;
    $film->save();

    return redirect()->back();
}




}
