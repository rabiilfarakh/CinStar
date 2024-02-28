<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class AJAXController extends Controller
{
    
    public function index (Request $request) {

        $searchQuery = $request->input('search');
       
        $movies = Film::where('title' , 'like', '%'.$searchQuery.'%')
        ->orwhere('genre' , 'like' , '%'.$searchQuery.'%')
        ->orwhere('acteur' , 'like' , '%'.$searchQuery.'%')->get();


        if(count($movies) > 0){
            return response()->json($movies);
        }
        else {
            return response()->json(['message' => 'No movies found']);
        }



    }


}
