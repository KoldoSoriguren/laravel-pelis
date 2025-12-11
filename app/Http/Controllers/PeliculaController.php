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
    public function destroy($id){
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();
        return redirect()->intended(route('peliculas.index'));
    }
    public function show($id){
        $pelicula = Pelicula::findOrFail($id);
        return view('peliculas.detalles', ['pelicula'=>$pelicula]);
    }
    public function edit($id){
        $pelicula = Pelicula::findOrFail($id);
        return view('peliculas.editar', ['pelicula'=>$pelicula]);
    }
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:150',
            'genero' => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'fecha_estreno' => 'required|date',
            'duracion_min' => 'required|integer|min:1',
            'clasificacion' => 'required|in:ATP,+7,+13,+18',
        ]);

        // Buscar la película
        $pelicula = Pelicula::findOrFail($id);

        // Actualizar los campos
        $pelicula->titulo = $request->input('titulo');
        $pelicula->director = $request->input('director');
        $pelicula->genero = $request->input('genero');
        $pelicula->sinopsis = $request->input('sinopsis');
        $pelicula->fecha_estreno = $request->input('fecha_estreno');
        $pelicula->duracion_min = $request->input('duracion_min');
        $pelicula->clasificacion = $request->input('clasificacion');

        // Guardar cambios en la base de datos
        $pelicula->save();

        // Redirigir a la lista de películas con mensaje de éxito
        return redirect()->intended(route('peliculas.index'));
    }    
    public function create(){
        return view('peliculas.crear');
    }
    public function store(){
        $datos=request()->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:150',
            'genero' => 'required|string|max:50',
            'sinopsis' => 'nullable|string',
            'fecha_estreno' => 'required|date',
            'duracion_min' => 'required|integer|min:1',
            'clasificacion' => 'required|in:ATP,+7,+13,+18',
        ]);
        Pelicula::create($datos);
        return redirect()->intended(route('peliculas.index'));
    }


    
}
