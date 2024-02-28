<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Image;
use App\Models\Salle;
use App\Models\chaises;
use App\Models\notification;
use App\Models\reservation;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

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
        $salleid = $request->salle_id;
        $filmId = $request->film_id;


        $filminfo = Film::where('id' , $filmId)->first();
        $salleinfo = Salle::where('id' , $salleid)->first();
        $chaiseinfo = chaises::where('id' , $chaiseId)->first();


        $ticket = Ticket::create([
            'film_id' => $filmId,
        ]);


        if($ticket) {

            reservation::create([
                    'chaise_id' => $chaiseId,
                    'user_id' => Auth::Id(),
                    'ticket_id' => $ticket->id,
            ]);

        }
        

        chaises::where('id', $chaiseId)->update(['status' => 'reserved']);



        notification::create([
            'user_id' => Auth::id(),
            'message'  => "Nous sommes heureux de vous informer que votre réservation pour le film {$filminfo->title} sera affichée le {$filminfo->date} à {$filminfo->presentation_time} dans la salle {$salleinfo->name} à la chaise numéro {$chaiseinfo->number}.",

        ]);


        
        return redirect()->back();
    }
}
