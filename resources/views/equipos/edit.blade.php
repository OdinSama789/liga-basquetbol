<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-dark text-white">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="text-center text-primary mb-4">
            ✏️ Editar Equipo
        </h1>

        <form action="{{ route('equipos.update', $equipo->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nombre del equipo
                </label>

                <input type="text"
                    name="nombre"
                    value="{{ $equipo->nombre }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Ciudad
                </label>

                <input type="text"
                    name="ciudad"
                    value="{{ $equipo->ciudad }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Entrenador
                </label>

                <input type="text"
                    name="entrenador"
                    value="{{ $equipo->entrenador }}"
                    class="form-control">

            </div>

            <button type="submit"
                class="btn btn-primary w-100">

                Actualizar Equipo

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