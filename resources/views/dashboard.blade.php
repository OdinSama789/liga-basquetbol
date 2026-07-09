<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BasketTotal - Liga de Básquetbol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eceff3;">

<nav class="navbar navbar-expand-lg shadow-sm px-4" style="background:linear-gradient(90deg,#b00020,#111);">
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
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">🔥 Menú de Liga</h5>
                    <hr>
                    <a href="{{ route('equipos.index') }}" class="btn btn-light w-100 text-start mb-2">🏀 Equipos</a>
                    <a href="{{ route('jugadores.index') }}" class="btn btn-light w-100 text-start mb-2">👤 Jugadores</a>
                    <a href="{{ route('partidos.index') }}" class="btn btn-light w-100 text-start mb-2">📅 Partidos</a>
                    <a href="{{ route('tabla.posiciones') }}" class="btn btn-light w-100 text-start">🏆 Tabla de posiciones</a>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold">📊 Resumen rápido</h6>
                    <p>Equipos: <strong>{{ $totalEquipos }}</strong></p>
                    <p>Jugadores: <strong>{{ $totalJugadores }}</strong></p>
                    <p>Partidos: <strong>{{ $totalPartidos }}</strong></p>
                </div>
            </div>
        </aside>

        <main class="col-md-6">

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="fw-bold">🏀 Partido destacado</h3>
                    <p class="text-muted">El encuentro que todos quieren ver.</p>

                    <div class="row text-center align-items-center bg-light rounded p-4">
                        <div class="col">
                            <h2>🔥</h2>
                            <h4 class="fw-bold">Lakers</h4>
                            <span class="badge bg-danger">Local</span>
                        </div>

                        <div class="col">
                            <h1 class="fw-bold text-danger">VS</h1>
                            <p class="mb-0">Hoy · 7:00 PM</p>
                            <small class="text-muted">Coliseo Municipal</small>
                        </div>

                        <div class="col">
                            <h2>⚡</h2>
                            <h4 class="fw-bold">Bulls</h4>
                            <span class="badge bg-dark">Visitante</span>
                        </div>
                    </div>

                    <a href="{{ route('partidos.index') }}" class="btn btn-danger mt-3">
                        Ver partidos
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h4 class="fw-bold">⭐ Equipos destacados</h4>

                    <div class="row g-3 mt-1">
                        <div class="col-md-3">
                            <div class="border rounded text-center p-3 bg-light">
                                🟣<br><strong>Warriors</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded text-center p-3 bg-light">
                                🟡<br><strong>Lakers</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded text-center p-3 bg-light">
                                🔴<br><strong>Bulls</strong>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded text-center p-3 bg-light">
                                🟢<br><strong>Celtics</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="fw-bold">🚀 Accesos principales</h4>

                    <div class="row g-3 mt-1">
                        <div class="col-md-4">
                            <a href="{{ route('equipos.index') }}" class="btn btn-outline-danger w-100 py-3">🏀 Equipos</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('jugadores.index') }}" class="btn btn-outline-dark w-100 py-3">👤 Jugadores</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('tabla.posiciones') }}" class="btn btn-outline-success w-100 py-3">🏆 Tabla</a>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <aside class="col-md-3">

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">👑 Jugador estrella</h5>
                    <div class="text-center">
                        <div class="display-3">🧍‍♂️</div>
                        <h4 class="fw-bold mb-0">Alexis Aguirre</h4>
                        <p class="text-muted">MVP del torneo</p>
                    </div>
                    <hr>
                    <p>Promedio: <strong>24.5 pts</strong></p>
                    <p>Equipo: <strong>BasketTotal</strong></p>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold">🏆 Top tabla</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Equipo</th>
                                <th>PG</th>
                                <th>PP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Lakers</td><td>8</td><td>1</td></tr>
                            <tr><td>Warriors</td><td>7</td><td>2</td></tr>
                            <tr><td>Bulls</td><td>6</td><td>3</td></tr>
                            <tr><td>Celtics</td><td>5</td><td>4</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold">📢 Aviso de liga</h5>
                    <div class="alert alert-danger">
                        Próxima jornada disponible. Revisa partidos y tabla.
                    </div>
                </div>
            </div>

        </aside>

    </div>
</div>

</body>
</html>