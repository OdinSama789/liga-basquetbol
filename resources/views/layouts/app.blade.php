<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BasketTotal')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eceff3;">

<nav class="navbar navbar-expand-lg shadow-sm px-4" style="background:linear-gradient(90deg,#b00020,#111);">
    <a class="navbar-brand fw-bold text-white fs-3" href="{{ route('dashboard') }}">
        🏀 Basket<span class="text-warning">Total</span>
        <small class="d-block fs-6 fw-normal">Liga de Básquetbol</small>
    </a>

    <div class="ms-auto">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
        <a href="{{ route('equipos.index') }}" class="btn btn-outline-light btn-sm">Equipos</a>
        <a href="{{ route('jugadores.index') }}" class="btn btn-outline-light btn-sm">Jugadores</a>
        <a href="{{ route('partidos.index') }}" class="btn btn-outline-light btn-sm">Partidos</a>
        <a href="{{ route('tabla.posiciones') }}" class="btn btn-warning btn-sm">Tabla</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>