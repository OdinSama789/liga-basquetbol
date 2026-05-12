<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-dark text-white">

<div class="container mt-5">

    <h1 class="text-warning mb-4">
        🏀 Lista de Equipos
    </h1>

    <a href="/equipos/create" class="btn btn-success mb-4">
        + Crear Equipo
    </a>

    <div class="row">

        @foreach($equipos as $equipo)

        <div class="col-md-4">

            <div class="card mb-4 shadow">

                <div class="card-body">

                    <h3 class="card-title">
                        {{ $equipo->nombre }}
                    </h3>

                    <p class="card-text">
                        <strong>Ciudad:</strong>
                        {{ $equipo->ciudad }}
                    </p>

                    <p class="card-text">
                        <strong>Entrenador:</strong>
                        {{ $equipo->entrenador }}
                    </p>

                    <a href="{{ route('equipos.edit', $equipo->id) }}"
                        class="btn btn-primary">

                        Editar

                    </a>

                    <form action="{{ route('equipos.destroy', $equipo->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger">

                            Eliminar

                        </button>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>