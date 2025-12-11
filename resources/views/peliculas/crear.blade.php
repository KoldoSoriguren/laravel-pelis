<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <h1>Nueva pelicula</h1>
    <form action="{{ route('peli.guardada') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="director">Director:</label>
        <input type="text" id="director" name="director"  required><br>

        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero" required><br>

        <label for="sinopsis">Sinopsis:</label>
        <textarea id="sinopsis" name="sinopsis" required></textarea><br>

        <label for="fecha_estreno">Fecha de estreno:</label>
        <input type="date" id="fecha_estreno" name="fecha_estreno" required><br>

        <label for="duracion_min">Duración (min):</label>
        <input type="number" id="duracion_min" name="duracion_min"  required><br>

        <label for="clasificacion">Clasificación:</label>
        <input type="text" id="clasificacion" name="clasificacion"  required><br>

        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('peliculas.index') }}">Volver a la listado</a>
    
</body>
</html>