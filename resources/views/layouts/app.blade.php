<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BasketTotal')</title>

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

        .content-card {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
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

    <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door me-2"></i> Dashboard
    </a>

    <a href="{{ route('equipos.index') }}" class="menu-link {{ request()->routeIs('equipos.*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i> Equipos
    </a>

    <a href="{{ route('jugadores.index') }}" class="menu-link {{ request()->routeIs('jugadores.*') ? 'active' : '' }}">
        <i class="bi bi-person me-2"></i> Jugadores
    </a>

    <a href="{{ route('partidos.index') }}" class="menu-link {{ request()->routeIs('partidos.*') ? 'active' : '' }}">
        <i class="bi bi-calendar-event me-2"></i> Partidos
    </a>

    <a href="{{ route('tabla.posiciones') }}" class="menu-link {{ request()->routeIs('tabla.posiciones') ? 'active' : '' }}">
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
        </div>
    </nav>

    <div class="container-fluid p-4">
        @yield('content')
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>