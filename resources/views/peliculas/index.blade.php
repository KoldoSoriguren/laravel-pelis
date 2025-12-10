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
                {{-- <a href="{{route('pelis.detalles')}}">Ver detalles</a>
                @auth
                    <a href="{{route('pelis.editar')}}">Editar</a>
                    <a href="{{route('pelis.eliminar')}}">Eliminar</a>
                @endauth --}}
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