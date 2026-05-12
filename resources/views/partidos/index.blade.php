<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Partidos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow">

    <div class="container">

        <a class="navbar-brand text-warning fw-bold"
            href="/equipos">

            🏀 Liga de Básquetbol

        </a>

        <div>

            <a href="/equipos"
                class="btn btn-outline-warning btn-sm">

                Equipos

            </a>

            <a href="/jugadores"
                class="btn btn-outline-light btn-sm">

                Jugadores

            </a>

            <a href="/partidos"
                class="btn btn-outline-success btn-sm">

                Partidos

            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">
    <h1 class="text-warning mb-4">🏀 Lista de Partidos</h1>

    <a href="{{ route('partidos.create') }}" class="btn btn-success mb-4">
        + Registrar Partido
    </a>

    <div class="row">
        @foreach($partidos as $partido)
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h4>{{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }}</h4>

                        <p><strong>Fecha:</strong> {{ $partido->fecha }}</p>
                        <p><strong>Marcador:</strong> {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}</p>

                        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-primary">
                            Editar
                        </a>

                        <form action="{{ route('partidos.destroy', $partido->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>