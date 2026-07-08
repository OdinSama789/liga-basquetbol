@extends('layouts.app')

@section('title', 'Jugadores')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-danger">⛹️ Lista de Jugadores</h1>

    <a href="{{ route('jugadores.create') }}" class="btn btn-success">
        + Registrar Jugador
    </a>

</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Jugador</th>
                    <th>Edad</th>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->id }}</td>
                    <td class="fw-bold">{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->edad }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td>{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</td>

                    <td class="text-center">
                        <a href="{{ route('jugadores.edit', $jugador->id) }}"
                           class="btn btn-primary btn-sm">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('jugadores.destroy', $jugador->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este jugador?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection