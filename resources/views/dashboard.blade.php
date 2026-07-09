<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BasketTotal - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6fb;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 280px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #071526, #0b1f38);
            color: white;
            padding: 22px;
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        .topbar {
            background: #071526;
            color: white;
            padding: 16px 28px;
        }

        .menu-link {
            display: block;
            color: #dbe7ff;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: #1d4ed8;
            color: white;
        }

        .quick-btn {
            display: block;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            border: 1px solid;
        }

        .stat-card {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
            overflow: hidden;
        }

        .stat-line {
            height: 5px;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 32px;
            color: white;
            margin: auto;
        }

        .content-card {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
        }

        .card,
        .content-card,
        .stat-card{
            transition: .25s ease;
        }

        .card:hover,
        .content-card:hover,
        .stat-card:hover{
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,.15);
        }

        .btn{
            transition: .25s;
        }

        .btn:hover{
            transform: scale(1.05);
        }

        .empty-box {
            background: linear-gradient(120deg, #f5f8ff, #ffffff);
            border-radius: 14px;
            padding: 45px 20px;
            text-align: center;
            color: #526071;
        }

        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="mb-4">
        <h2 class="fw-bold mb-0">
            🏀 Basket<span class="text-warning">Total</span>
        </h2>
        <small class="text-white-50">Liga de Básquetbol</small>
    </div>

    <p class="text-white-50 small fw-bold mt-4">PANEL ADMINISTRATIVO</p>

    <a href="{{ route('dashboard') }}" class="menu-link active">
        <i class="bi bi-house-door me-2"></i> Dashboard
    </a>

    <a href="{{ route('equipos.index') }}" class="menu-link">
        <i class="bi bi-people me-2"></i> Equipos
    </a>

    <a href="{{ route('jugadores.index') }}" class="menu-link">
        <i class="bi bi-person me-2"></i> Jugadores
    </a>

    <a href="{{ route('partidos.index') }}" class="menu-link">
        <i class="bi bi-calendar-event me-2"></i> Partidos
    </a>

    <a href="{{ route('tabla.posiciones') }}" class="menu-link">
        <i class="bi bi-trophy me-2"></i> Tabla de posiciones
    </a>

    <p class="text-white-50 small fw-bold mt-5">ACCIONES RÁPIDAS</p>

    <a href="{{ route('equipos.create') }}" class="quick-btn text-danger border-danger">
        <i class="bi bi-plus-circle me-2"></i> Registrar Equipo
    </a>

    <a href="{{ route('jugadores.create') }}" class="quick-btn text-primary border-primary">
        <i class="bi bi-person-plus me-2"></i> Registrar Jugador
    </a>

    <a href="{{ route('partidos.create') }}" class="quick-btn text-success border-success">
        <i class="bi bi-calendar-plus me-2"></i> Registrar Partido
    </a>

    <p class="text-white-50 small fw-bold mt-5">RESUMEN DEL TORNEO</p>

    <div class="d-flex justify-content-between mb-3">
        <span>Equipos</span>
        <span class="badge bg-primary">{{ $totalEquipos }}</span>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <span>Jugadores</span>
        <span class="badge bg-secondary">{{ $totalJugadores }}</span>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <span>Partidos</span>
        <span class="badge bg-success">{{ $totalPartidos }}</span>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <span>Líder</span>
        <span class="badge bg-warning text-dark">{{ $lider }}</span>
    </div>

    <div class="border border-warning rounded p-3 text-warning small">
        <strong>🏀 Recomendación</strong><br>
        Primero registra equipos, luego jugadores y finalmente partidos.
    </div>

</aside>

<main class="main-content">

    <nav class="topbar d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="bi bi-list"></i>
        </h5>

        <div class="d-flex gap-2">
            <a href="{{ route('equipos.index') }}" class="btn btn-sm btn-outline-light">Equipos</a>
            <a href="{{ route('jugadores.index') }}" class="btn btn-sm btn-outline-light">Jugadores</a>
            <a href="{{ route('partidos.index') }}" class="btn btn-sm btn-outline-light">Partidos</a>
            <a href="{{ route('tabla.posiciones') }}" class="btn btn-sm btn-warning fw-bold">Tabla</a>
            <span class="btn btn-sm btn-primary fw-bold">Temporada 2026</span>
        </div>
    </nav>

    <div class="container-fluid p-4">

        <div class="mb-4">
            <h1 class="fw-bold mb-1">Dashboard General</h1>
            <p class="text-muted">
                Gestión profesional de equipos, jugadores, partidos y tabla de posiciones.
            </p>
        </div>

        <div class="row g-4 mb-4">

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-primary mb-3">
                            <i class="bi bi-dribbble"></i>
                        </div>
                        <h2 class="fw-bold text-primary">{{ $totalEquipos }}</h2>
                        <p class="text-muted mb-0">Equipos registrados</p>
                    </div>
                    <div class="stat-line bg-primary"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-secondary mb-3">
                            <i class="bi bi-person"></i>
                        </div>
                        <h2 class="fw-bold text-secondary">{{ $totalJugadores }}</h2>
                        <p class="text-muted mb-0">Jugadores activos</p>
                    </div>
                    <div class="stat-line bg-secondary"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-success mb-3">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <h2 class="fw-bold text-success">{{ $totalPartidos }}</h2>
                        <p class="text-muted mb-0">Partidos registrados</p>
                    </div>
                    <div class="stat-line bg-success"></div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card stat-card">
                    <div class="card-body text-center p-4">
                        <div class="icon-circle bg-warning mb-3">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h2 class="fw-bold text-warning">{{ $lider }}</h2>
                        <p class="text-muted mb-0">Líder actual</p>
                    </div>
                    <div class="stat-line bg-warning"></div>
                </div>
            </div>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="fw-bold">🔥 Últimos partidos</h4>
                            <a href="{{ route('partidos.index') }}" class="btn btn-sm btn-outline-dark">Ver todos</a>
                        </div>

                        @forelse($ultimosPartidos as $partido)
                            <div class="border-bottom py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>{{ $partido->equipoLocal->nombre ?? 'Equipo eliminado' }}</strong>
                                    <span class="badge bg-dark">
                                        {{ $partido->puntos_local }} - {{ $partido->puntos_visitante }}
                                    </span>
                                    <strong>{{ $partido->equipoVisitante->nombre ?? 'Equipo eliminado' }}</strong>
                                </div>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($partido->fecha)->format('d/m/Y') }}
                                </small>
                            </div>
                        @empty
                            <div class="empty-box">
                                <h1><i class="bi bi-calendar-x"></i></h1>
                                <p class="fw-bold">No hay partidos registrados todavía.</p>
                                <small>Registra el primer partido de la temporada.</small>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="fw-bold">👤 Últimos jugadores</h4>
                            <a href="{{ route('jugadores.index') }}" class="btn btn-sm btn-outline-dark">Ver todos</a>
                        </div>

                        @forelse($ultimosJugadores as $jugador)
                            <div class="border-bottom py-3">
                                <strong>{{ $jugador->nombre }}</strong>
                                <div class="text-muted small">
                                    {{ $jugador->posicion }} -
                                    {{ $jugador->equipo->nombre ?? 'Sin equipo' }}
                                </div>
                            </div>
                        @empty
                            <div class="empty-box">
                                <h1><i class="bi bi-people"></i></h1>
                                <p class="fw-bold">No hay jugadores registrados todavía.</p>
                                <small>Comienza agregando jugadores a los equipos.</small>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="fw-bold">🏀 Equipos registrados</h4>
                            <a href="{{ route('equipos.index') }}" class="btn btn-sm btn-outline-dark">Ver todos</a>
                        </div>

                        @forelse($equipos->take(6) as $equipo)
                            <div class="d-flex justify-content-between border-bottom py-3">
                                <strong>{{ $equipo->nombre }}</strong>
                                <span class="badge bg-primary">
                                    {{ $equipo->jugadores_count }} jugadores
                                </span>
                            </div>
                        @empty
                            <div class="empty-box">
                                <h1><i class="bi bi-people-fill"></i></h1>
                                <p class="fw-bold">No hay equipos registrados todavía.</p>
                                <small>Registra el primer equipo del torneo.</small>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4 mt-1">

            <div class="col-lg-8">
                <div class="card content-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold">🏆 Top tabla de posiciones</h4>
                            <a href="{{ route('tabla.posiciones') }}" class="btn btn-warning fw-bold">
                                Ver tabla completa
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Equipo</th>
                                        <th>PJ</th>
                                        <th>PG</th>
                                        <th>PP</th>
                                        <th>Dif</th>
                                        <th>Pts</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse(array_slice($tabla, 0, 5) as $index => $fila)
                                        <tr>
                                            <td class="fw-bold">{{ $index + 1 }}</td>
                                            <td>{{ $fila['equipo'] }}</td>
                                            <td>{{ $fila['partidos'] }}</td>
                                            <td>{{ $fila['ganados'] }}</td>
                                            <td>{{ $fila['perdidos'] }}</td>
                                            <td>{{ $fila['diferencia'] }}</td>
                                            <td>
                                                <span class="badge bg-danger">
                                                    {{ $fila['puntos'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
                                                <div class="empty-box">
                                                    <h1><i class="bi bi-clipboard-x"></i></h1>
                                                    <p class="fw-bold">No hay datos para mostrar en la tabla.</p>
                                                    <small>Registra partidos para generar posiciones.</small>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card content-card">
                    <div class="card-body">
                        <h4 class="fw-bold mb-4">
                            <i class="bi bi-gear-fill text-primary"></i> Estado del sistema
                        </h4>

                        <div class="d-flex gap-3 border-bottom pb-3 mb-3">
                            <span class="btn btn-success rounded-circle">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <div>
                                <strong class="text-success">Torneo activo</strong>
                                <p class="text-muted mb-0 small">La temporada está en curso.</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 border-bottom pb-3 mb-3">
                            <span class="btn btn-warning rounded-circle">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <div>
                                <strong class="text-warning">Tabla disponible</strong>
                                <p class="text-muted mb-0 small">Puedes consultar la tabla de posiciones.</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <span class="btn btn-primary rounded-circle">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <div>
                                <strong class="text-primary">Sistema operativo</strong>
                                <p class="text-muted mb-0 small">BasketTotal funcionando correctamente.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <footer class="text-center mt-5 border-top pt-4">

            <h5 class="fw-bold text-danger">
                🏀 BasketTotal
            </h5>

            <p class="mb-1">
                Sistema de Gestión de Liga de Básquetbol
            </p>

            <small class="text-muted">
                Universidad Tecnológica de los Andes<br>
                Ingeniería de Sistemas e Informática<br>
                2026
            </small>

        </footer>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>