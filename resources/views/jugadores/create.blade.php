<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Jugador</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow">

    <div class="container">

        <a class="navbar-brand text-warning fw-bold"
            href="/jugadores">

            🏀 Liga de Básquetbol

        </a>

    </div>

</nav>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="text-center text-success mb-4">
            ⛹️ Registrar Jugador
        </h1>

        <form action="{{ route('jugadores.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nombre
                </label>

                <input type="text"
                    name="nombre"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Edad
                </label>

                <input type="number"
                    name="edad"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Posición
                </label>

                <select
                    name="posicion"
                    class="form-select"
                    required>

                    <option value="">
                        Seleccione una posición
                    </option>

                    <option value="Base">
                        🏀 Base (Point Guard)
                    </option>

                    <option value="Escolta">
                        🎯 Escolta (Shooting Guard)
                    </option>

                    <option value="Alero">
                        ⚡ Alero (Small Forward)
                    </option>

                    <option value="Ala-Pívot">
                        💪 Ala-Pívot (Power Forward)
                    </option>

                    <option value="Pívot">
                        🗼 Pívot (Center)
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Equipo
                </label>

                <select name="equipo_id"
                    class="form-select">

                    @foreach($equipos as $equipo)

                        <option value="{{ $equipo->id }}">

                            {{ $equipo->nombre }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button type="submit"
                class="btn btn-success w-100">

                Guardar Jugador

            </button>

        </form>

        <a href="{{ route('jugadores.index') }}"
            class="btn btn-secondary mt-3">

            Volver

        </a>

    </div>

</div>

</body>
</html>