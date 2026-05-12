<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Equipo</title>
</head>
<body>

    <h1>Editar Equipo</h1>

    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre del equipo:</label><br>
        <input type="text" name="nombre" value="{{ $equipo->nombre }}"><br><br>

        <label>Ciudad:</label><br>
        <input type="text" name="ciudad" value="{{ $equipo->ciudad }}"><br><br>

        <label>Entrenador:</label><br>
        <input type="text" name="entrenador" value="{{ $equipo->entrenador }}"><br><br>

        <button type="submit">Actualizar Equipo</button>
    </form>

    <br>
    <a href="{{ route('equipos.index') }}">Volver</a>

</body>
</html>