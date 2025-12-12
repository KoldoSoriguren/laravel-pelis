<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card w-50">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Crear Cuenta</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cuenta.creada') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la cuenta" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('sesion.iniciar') }}">¿Ya tienes cuenta? Iniciar sesión</a><br>
                <a href="{{ route('peliculas.index') }}">Volver al listado de películas</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
