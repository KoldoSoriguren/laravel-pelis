<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    @auth
        Bienvenido, {{ session('user_name') }}
        <a href="{{route('sesion.destroy')}}">Cerrar sesion</a>
        <a href="{{route('peli.crear')}}">Nueva peli</a>

    @else
     <a href="{{route('sesion.iniciar')}}">Iniciar sesion</a>
     
    @endauth


<h1>Peliculas disponibles</h1>
<table>
    @foreach($var as $pelicula)
        <tr>
            <td>{{ $pelicula->titulo }}</td>
            <td>{{ $pelicula->director }}</td>
            <td>{{ $pelicula->genero }}</td>
            <td>{{ $pelicula->sinopsis }}</td>
            <td>{{ $pelicula->fecha_estreno }}</td>
            <td>{{ $pelicula->duracion_min }}</td>
            <td>{{ $pelicula->clasificacion }}</td>
            <td>
                <a href="{{ route('pelis.detalles', $pelicula->id) }}">Ver detalles</a>
                @auth
                    <a href="{{ route('pelis.editar', $pelicula->id) }}">Editar</a>
                    <form action="{{ route('pelis.borrar', $pelicula->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                @endauth
            </td>

        </tr>
    @endforeach

</table>


{{-- <form action="{{ route('idioma.cambiar') }}" method="POST" class="d-flex gap-2 align-items-center">
    @crsf
    <label for="idioma" class="mb-0">Cambiar idioma:</label>
    <select name="idioma" id="idioma" class="form-select w-auto" required>
        <option value="Euskera">Euskera</option>
        <option value="Castellano">Castellano</option>
    </select>
    <button type="submit" class="btn btn-primary">Cambiar</button>
</form> --}}
</body>
</html>