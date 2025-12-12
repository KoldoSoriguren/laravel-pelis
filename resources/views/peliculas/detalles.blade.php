<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $pelicula->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Director:</strong> {{ $pelicula->director }}</p>
            <p><strong>Género:</strong> {{ $pelicula->genero }}</p>
            <p><strong>Fecha de estreno:</strong> {{ \Carbon\Carbon::parse($pelicula->fecha_estreno)->format('d/m/Y') }}</p>
            <p><strong>Duración:</strong> {{ $pelicula->duracion_min }} min</p>
            <p><strong>Clasificación:</strong> {{ $pelicula->clasificacion }}</p>
            <p><strong>Sinopsis:</strong> {{ $pelicula->sinopsis }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Volver al listado</a>
            @auth
                <a href="{{ route('pelis.editar', $pelicula->id) }}" class="btn btn-warning">Editar película</a>
            @endauth
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
