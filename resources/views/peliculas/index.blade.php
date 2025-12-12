<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

@php
    $idioma = request()->cookie('idioma', 'Castellano');
@endphp

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5">Películas disponibles</h1>
        <div>
            @auth
                <span class="me-2 fw-bold">Bienvenido, {{ session('user_name') }}</span>
                <a href="{{ route('sesion.destroy') }}" class="btn btn-danger btn-sm">Cerrar sesión</a>
                <a href="{{ route('peli.crear') }}" class="btn btn-success btn-sm ms-2">Nueva película</a>
            @else
                <a href="{{ route('sesion.iniciar') }}" class="btn btn-primary">Iniciar sesión</a>
            @endauth
        </div>
    </div>

    <!-- Formulario de idioma -->
    <div class="mb-4">
        <form action="{{ route('idioma.cambia') }}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            <label for="idioma" class="mb-0 fw-semibold">Cambiar idioma:</label>
            <select name="idioma" id="idioma" class="form-select w-auto" required>
                <option value="Euskera" {{ $idioma == 'Euskera' ? 'selected' : '' }}>Euskera</option>
                <option value="Castellano" {{ $idioma == 'Castellano' ? 'selected' : '' }}>Castellano</option>
            </select>
            <button type="submit" class="btn btn-primary">Cambiar</button>
        </form>
    </div>

    <!-- Tabla de películas -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        @if ($idioma == 'Euskera')
                            <th>Izenburua</th>
                            <th>Zuzendaria</th>
                            <th>Generoa</th>
                            <th>Laburpena</th>
                            <th>Estreno data</th>
                            <th>Iraupena min</th>
                            <th>Balorazioa</th>
                            <th>Zereginak</th>
                        @else
                            <th>Título</th>
                            <th>Director</th>
                            <th>Género</th>
                            <th>Sinopsis</th>
                            <th>Fecha de estreno</th>
                            <th>Duración (min)</th>
                            <th>Clasificación</th>
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($var as $pelicula)
                        <tr>
                            <td>{{ $pelicula->titulo }}</td>
                            <td>{{ $pelicula->director }}</td>
                            <td>{{ $pelicula->genero }}</td>
                            <td>{{ Str::limit($pelicula->sinopsis, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($pelicula->fecha_estreno)->format('d/m/Y') }}</td>
                            <td>{{ $pelicula->duracion_min }}</td>
                            <td>{{ $pelicula->clasificacion }}</td>
                            <td class="d-flex gap-1 flex-wrap">
                                <a href="{{ route('pelis.detalles', $pelicula->id) }}" class="btn btn-info btn-sm">Ver</a>
                                @auth
                                    <a href="{{ route('pelis.editar', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('pelis.borrar', $pelicula->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
