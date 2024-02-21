<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
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
            'salle_id' => '',
        ]);

        Film::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'acteur' => $request->acteur,
            'date' => $request->date,
            'salle_id' => $request->salle_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Film added successfully');
    }
}
