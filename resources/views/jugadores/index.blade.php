<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow">
    <div class="container">

        <a class="navbar-brand text-warning fw-bold" href="/equipos">
            🏀 Liga de Básquetbol
        </a>

        <div>
            <a href="/equipos" class="btn btn-outline-warning btn-sm">
                Equipos
            </a>

            <a href="/jugadores" class="btn btn-outline-light btn-sm">
                Jugadores
            </a>
        </div>

    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-warning mb-4">
        ⛹️ Lista de Jugadores
    </h1>

    <a href="{{ route('jugadores.create') }}"
        class="btn btn-success mb-4">

        + Registrar Jugador

    </a>

    <div class="row">

        @foreach($jugadores as $jugador)

        <div class="col-md-4">

            <div class="card mb-4 shadow">

                <div class="card-body">

                    <h3 class="card-title">
                        {{ $jugador->nombre }}
                    </h3>

                    <p>
                        <strong>Edad:</strong>
                        {{ $jugador->edad }}
                    </p>

                    <p>
                        <strong>Posición:</strong>
                        {{ $jugador->posicion }}
                    </p>

                    <p>
                        <strong>Equipo:</strong>
                        {{ $jugador->equipo->nombre }}
                    </p>

                    <a href="{{ route('jugadores.edit', ['jugador' => $jugador->id]) }}"
                        class="btn btn-primary">

                        Editar

                    </a>

                    <form action="{{ route('jugadores.destroy', ['jugador' => $jugador->id]) }}"
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