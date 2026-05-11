<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equipo</title>
</head>
<body>

    <h1>Registrar Equipo</h1>

    <form action="{{ route('equipos.store') }}" method="POST"> //Laravel buscará la ruta:equipos.store

        @csrf

        <label>Nombre del equipo:</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

        <label>Ciudad:</label>
        <br>
        <input type="text" name="ciudad">
        <br><br>

        <label>Entrenador:</label>
        <br>
        <input type="text" name="entrenador">
        <br><br>

        <button type="submit">Guardar Equipo</button>

    </form>

</body>
</html> 