<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index()
    {
        $var = Pelicula::all();
        return view('peliculas.index', ['var'=>$var]);
    }
    
}
