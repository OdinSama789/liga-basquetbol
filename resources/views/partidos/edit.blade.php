<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Partido</title>
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
    <div class="card shadow p-4">
        <h1 class="text-primary mb-4">✏️ Editar Partido</h1>

        <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Equipo Local</label>
            <select name="equipo_local_id" class="form-select mb-3">
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $partido->equipo_local_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Equipo Visitante</label>
            <select name="equipo_visitante_id" class="form-select mb-3">
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $partido->equipo_visitante_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>

            <label>Fecha</label>
            <input type="date" name="fecha" value="{{ $partido->fecha }}" class="form-control mb-3">

            <label>Puntos Local</label>
            <input type="number" name="puntos_local" value="{{ $partido->puntos_local }}" class="form-control mb-3">

            <label>Puntos Visitante</label>
            <input type="number" name="puntos_visitante" value="{{ $partido->puntos_visitante }}" class="form-control mb-3">

            <button class="btn btn-primary w-100">Actualizar Partido</button>
        </form>

        <a href="{{ route('partidos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>

</body>
</html>