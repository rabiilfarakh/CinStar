<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Image;

class reservationController extends Controller
{
    public function showReservation($id){
        $film = Film::findOrFail($id);
        $tailleSalle = $film->salle->taille;
        $images = Image::where('film_id', $id)->get();
        return view('user.reservation',compact('film','tailleSalle', 'images'));
    }
}
