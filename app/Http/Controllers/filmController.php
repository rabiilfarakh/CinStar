<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\films;
use App\Models\images;

class filmController extends Controller
{
    public function showFilm($id){
        $film = films::findOrFail($id); 
        $images = images::where('film_id', $id)->get();
        return view('user.film',compact('film','images'));
    }
}
