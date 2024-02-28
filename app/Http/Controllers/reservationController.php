<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Image;
use App\Models\Salle;
use App\Models\chaises;
class reservationController extends Controller
{
    public function showReservation($id){
        $film = Film::findOrFail($id);

        $tailleSalle = $film->salle->taille;
        $salleid = $film->salle_id;
        $salle = Salle::findOrFail($salleid);
        $images = Image::where('film_id', $id)->get();
        return view('user.reservation',compact('film','tailleSalle', 'images','salle'));
    }

    public function reservation(Request $request){
        $chaiseId = $request->input('chair_id');
        chaises::where('id', $chaiseId)->update(['status' => 'reserved']);
        return redirect()->back();
    }
}
