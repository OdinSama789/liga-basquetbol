<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
</head>
<body>

    <h1>Lista de Equipos</h1>

    <a href="/equipos/create">
        Crear nuevo equipo
    </a>

    <hr>

    @foreach($equipos as $equipo)

        <h3>{{ $equipo->nombre }}</h3>

        <p>Ciudad: {{ $equipo->ciudad }}</p>

        <p>Entrenador: {{ $equipo->entrenador }}</p>

        <a href="{{ route('equipos.edit', $equipo->id) }}">
            Editar
        </a>

        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>

        </form>

        <hr>

    @endforeach

</body>
</html>