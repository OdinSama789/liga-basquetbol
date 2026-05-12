<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-dark text-white">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="text-center text-success mb-4">
            🏀 Registrar Equipo
        </h1>

        <form action="{{ route('equipos.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nombre del equipo
                </label>

                <input type="text"
                    name="nombre"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Ciudad
                </label>

                <input type="text"
                    name="ciudad"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Entrenador
                </label>

                <input type="text"
                    name="entrenador"
                    class="form-control">

            </div>

            <button type="submit"
                class="btn btn-success w-100">

                Guardar Equipo

            </button>

        </form>

        <a href="{{ route('equipos.index') }}"
            class="btn btn-secondary mt-3">

            Volver

        </a>

    </div>

</div>

</body>
</html>