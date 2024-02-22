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
        return view('admin.dashboard', compact('salles'));
    }

    public function storeFilm(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'genre' => 'required|string',
        'acteur' => 'required|string',
        'date' => 'required|date',
        'salle_id' => 'required|exists:salles,id',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $film = Film::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'acteur' => $request->acteur,
        'date' => $request->date,
        'salle_id' => $request->salle_id,
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

    return redirect()->route('dashboard');
}



}
