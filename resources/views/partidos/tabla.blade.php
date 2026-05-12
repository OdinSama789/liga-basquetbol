<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Posiciones</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white">

<div class="container mt-5">

    <h1 class="text-warning mb-4">
        🏆 Tabla de Posiciones
    </h1>

    <table class="table table-dark table-striped">

        <thead>

            <tr>
                <th>Equipo</th>
                <th>Ganados</th>
                <th>Perdidos</th>
                <th>Puntos Favor</th>
                <th>Puntos Contra</th>
            </tr>

        </thead>

        <tbody>

            @foreach($tabla as $fila)

            <tr>

                <td>{{ $fila['equipo'] }}</td>
                <td>{{ $fila['ganados'] }}</td>
                <td>{{ $fila['perdidos'] }}</td>
                <td>{{ $fila['favor'] }}</td>
                <td>{{ $fila['contra'] }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>