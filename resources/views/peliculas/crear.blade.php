<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="mb-4">Nueva Película</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peli.guardada') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="titulo" class="form-control" placeholder="Título" required>
        </div>
        <div class="mb-3">
            <input type="text" name="director" class="form-control" placeholder="Director" required>
        </div>
        <div class="mb-3">
            <input type="text" name="genero" class="form-control" placeholder="Género" required>
        </div>
        <div class="mb-3">
            <textarea name="sinopsis" class="form-control" placeholder="Sinopsis" required></textarea>
        </div>
        <div class="mb-3">
            <input type="date" name="fecha_estreno" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="duracion_min" class="form-control" placeholder="Duración (min)" required>
        </div>
        <div class="mb-3">
            <select name="clasificacion" class="form-select" required>
                <option value="" disabled selected>Selecciona clasificación</option>
                <option value="ATP">ATP</option>
                <option value="+7">+7</option>
                <option value="+13">+13</option>
                <option value="+18">+18</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('peliculas.index') }}" class="btn btn-secondary ms-2">Volver al listado</a>
    </form>
</div>

</body>
</html>
