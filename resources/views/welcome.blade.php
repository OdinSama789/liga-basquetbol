<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga de Básquetbol</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white">

<div class="container text-center mt-5">

    <h1 class="display-3 text-warning fw-bold mb-4">
        🏀 Sistema Liga de Básquetbol
    </h1>

    <p class="lead mb-5">
        Gestión de equipos, jugadores, partidos y tabla de posiciones.
    </p>

    <div class="d-flex justify-content-center gap-3">

        <a href="/equipos" class="btn btn-warning btn-lg">
            Equipos
        </a>

        <a href="/jugadores" class="btn btn-primary btn-lg">
            Jugadores
        </a>

        <a href="/partidos" class="btn btn-success btn-lg">
            Partidos
        </a>

        <a href="/tabla-posiciones" class="btn btn-danger btn-lg">
            Tabla
        </a>

    </div>

</div>

</body>
</html>