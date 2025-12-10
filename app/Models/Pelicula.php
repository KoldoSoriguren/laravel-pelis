<?php

// app/Models/Pelicula.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'director',
        'genero',
        'sinopsis',
        'fecha_estreno',
        'duracion_min',
        'clasificacion',
    ];
    
}
