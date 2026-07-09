<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BasketTotal - Liga de Básquetbol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eceff3; padding-top:95px;">

<nav class="navbar navbar-expand-lg shadow-sm px-4 fixed-top"
    style="background:linear-gradient(90deg,#b00020,#111);">
    <a class="navbar-brand fw-bold text-white fs-3" href="{{ route('dashboard') }}">
        🏀 Basket<span class="text-warning">Total</span>
        <small class="d-block fs-6 fw-normal">Liga de Básquetbol</small>
    </a>

    <div class="ms-auto">
        <a href="{{ route('equipos.index') }}" class="btn btn-light btn-sm">Equipos</a>
        <a href="{{ route('jugadores.index') }}" class="btn btn-outline-light btn-sm">Jugadores</a>
        <a href="{{ route('partidos.index') }}" class="btn btn-outline-light btn-sm">Partidos</a>
        <a href="{{ route('tabla.posiciones') }}" class="btn btn-warning btn-sm">Tabla</a>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="row g-3">

        <aside class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold">📊 Estadísticas de liga</h5>
                    <hr>

                    <p class="mb-3">🏀 Equipos registrados:
                        <strong>{{ $totalEquipos }}</strong>
                    </p>

                    <p class="mb-3">👤 Jugadores registrados:
                        <strong>{{ $totalJugadores }}</strong>
                    </p>

                    <p class="mb-3">📅 Partidos registrados:
                        <strong>{{ $totalPartidos }}</strong>
                    </p>

                    <div class="alert alert-danger mb-0">
                        Temporada activa 2026
                    </div>
                </div>
            </div>
        </aside>

        <main class="col-md-6">

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="fw-bold">🏀 Panel principal</h3>
                    <p class="text-muted">
                        Sistema web para la gestión de equipos, jugadores, partidos y tabla de posiciones.
                    </p>

                    <div class="row g-3 text-center mt-2">
                        <div class="col-md-4">
                            <div class="bg-light rounded p-4 border">
                                <h1>🏀</h1>
                                <h3 class="fw-bold">{{ $totalEquipos }}</h3>
                                <p class="mb-0">Equipos</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-light rounded p-4 border">
                                <h1>👤</h1>
                                <h3 class="fw-bold">{{ $totalJugadores }}</h3>
                                <p class="mb-0">Jugadores</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="bg-light rounded p-4 border">
                                <h1>📅</h1>
                                <h3 class="fw-bold">{{ $totalPartidos }}</h3>
                                <p class="mb-0">Partidos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h4 class="fw-bold">🔥 Estado del torneo</h4>
                    <p class="text-muted">
                        Control general del campeonato de básquetbol.
                    </p>

                    <div class="row text-center align-items-center bg-light rounded p-4">
                        <div class="col">
                            <h2>🏆</h2>
                            <h5 class="fw-bold">Competencia activa</h5>
                            <span class="badge bg-success">En curso</span>
                        </div>

                        <div class="col">
                            <h1 class="fw-bold text-danger">VS</h1>
                            <p class="mb-0">Partidos registrados</p>
                            <small class="text-muted">{{ $totalPartidos }} encuentros</small>
                        </div>

                        <div class="col">
                            <h2>📊</h2>
                            <h5 class="fw-bold">Tabla actualizada</h5>
                            <span class="badge bg-dark">Disponible</span>
                        </div>
                    </div>

                    <a href="{{ route('partidos.index') }}" class="btn btn-danger mt-3">
                        Gestionar partidos
                    </a>
                </div>
            </div>

        </main>

        <aside class="col-md-3">

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">🏆 Tabla de posiciones</h5>
                    <p class="text-muted">
                        Consulta el rendimiento de los equipos registrados.
                    </p>

                    <a href="{{ route('tabla.posiciones') }}" class="btn btn-warning w-100">
                        Ver tabla
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">👤 Gestión de jugadores</h5>
                    <p class="text-muted">
                        Registra jugadores con posiciones oficiales de básquetbol.
                    </p>

                    <a href="{{ route('jugadores.index') }}" class="btn btn-dark w-100">
                        Ver jugadores
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold">📢 Aviso de liga</h5>
                    <div class="alert alert-danger mb-0">
                        Recuerda registrar primero equipos antes de crear jugadores o partidos.
                    </div>
                </div>
            </div>

        </aside>

    </div>
</div>

</body>
</html>