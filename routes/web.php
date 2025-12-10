<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController; // <-- IMPORT NECESARIO
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view('prueba');
});

// Ruta para mostrar todas las películas
Route::get('/index', [PeliculaController::class, 'index'])->name('peliculas.index');


Route::get('/sesion/iniciar', [UserController::class, 'iniciar'])->name('sesion.iniciar');
Route::post('/sesion/iniciar', [UserController::class, 'login'])->name('sesion.iniciada');
Route::post('/idioma/cambiar', [UserController::class, 'cambiarIdioma'])->name('idioma.cambiar');

