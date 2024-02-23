<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Image;

class filmController extends Controller
{
    public function showFilm($id){
        $film = Film::findOrFail($id); 
        $images = Image::where('film_id', $id)->get();
        return view('user.film',compact('film','images'));
    }
}
