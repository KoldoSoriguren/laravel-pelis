<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-warning text-dark">
            <h3 class="mb-0">Editar película: {{ $pelicula->titulo }}</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pelicula.editada', $pelicula->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $pelicula->id }}">

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pelicula->titulo }}" required>
                </div>

                <div class="mb-3">
                    <label for="director" class="form-label">Director</label>
                    <input type="text" class="form-control" id="director" name="director" value="{{ $pelicula->director }}" required>
                </div>

                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="{{ $pelicula->genero }}" required>
                </div>

                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required>{{ $pelicula->sinopsis }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_estreno" class="form-label">Fecha de estreno</label>
                    <input type="date" class="form-control" id="fecha_estreno" name="fecha_estreno" value="{{ $pelicula->fecha_estreno }}" required>
                </div>

                <div class="mb-3">
                    <label for="duracion_min" class="form-label">Duración (min)</label>
                    <input type="number" class="form-control" id="duracion_min" name="duracion_min" value="{{ $pelicula->duracion_min }}" required>
                </div>

                <div class="mb-3">
                    <label for="clasificacion" class="form-label">Clasificación</label>
                    <select class="form-select" id="clasificacion" name="clasificacion" required>
                        <option value="ATP" {{ $pelicula->clasificacion == 'ATP' ? 'selected' : '' }}>ATP</option>
                        <option value="+7" {{ $pelicula->clasificacion == '+7' ? 'selected' : '' }}>+7</option>
                        <option value="+13" {{ $pelicula->clasificacion == '+13' ? 'selected' : '' }}>+13</option>
                        <option value="+18" {{ $pelicula->clasificacion == '+18' ? 'selected' : '' }}>+18</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Guardar cambios</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('peliculas.index') }}" class="btn btn-secondary">Volver al listado</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
