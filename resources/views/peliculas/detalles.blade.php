<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$pelicula->titulo}}</h1>
    <p><strong>Director:</strong> {{$pelicula->director}}</p>
    <p><strong>Género:</strong> {{$pelicula->genero}}</p>
    <p><strong>Fecha de estreno:</strong> {{$pelicula->fecha_estreno}}</p>
    <p><strong>Duración (min):</strong> {{$pelicula->duracion_min}}</p>
    <p><strong>Clasificación:</strong> {{$pelicula->clasificacion}}</p>
    <p><strong>Sinopsis:</strong> {{$pelicula->sinopsis}}</p>
    <a href="{{ route('peliculas.index') }}">Volver a la listado</a>
    @auth
        <a href="{{ route('pelis.editar', $pelicula->id) }}">Editar</a>
    @endauth


</body>
</html>