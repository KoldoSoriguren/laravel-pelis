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
Route::get('/sesion/cerrar', [UserController::class, 'cerrar'])->name('sesion.cerrar');


Route::get('/peliculas/ver/{id}', [PeliculaController::class, 'show'])->name('pelis.detalles');
Route::delete('/peliculas/borrar/{id}', [PeliculaController::class, 'destroy'])->name('pelis.borrar');
Route::get('/peliculas/{id}/editar', [PeliculaController::class, 'edit'])->name('pelis.editar');
Route::get('/sesion/logout',[UserController::class, 'logout'])->name('sesion.destroy');
Route::post('/palicula/{id}/editada',[PeliculaController::class, 'update'])->name('pelicula.editada');
Route::get('/pelicula/crear',[PeliculaController::class, 'create'])->name('peli.crear');
Route::post('/pelicula/guardada',[PeliculaController::class, 'store'])->name('peli.guardada');

Route::post('/user/idioma',[UserController::class, 'cambiaIdioma'])->name('idioma.cambia');



Route::get('/user/crear',[UserController::class, 'creaCuent'])->name('cuenta.crear');



Route::post('/user/creada',[UserController::class, 'cuentaCreada'])->name('cuenta.creada');