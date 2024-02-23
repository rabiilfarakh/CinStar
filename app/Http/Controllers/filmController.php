<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\films;
use App\Models\images;
use Nette\Utils\Image;
use Illuminate\Http\Request;

class filmController extends Controller
{
    public function showFilm($id){
        $film = Film::findOrFail($id); 
        $images = Image::where('film_id', $id)->get();
        return view('user.film',compact('film','images'));
    }
}
