@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-danger">🏀 Lista de Equipos</h1>

    <a href="{{ route('equipos.create') }}" class="btn btn-success">
        + Crear Equipo
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Equipo</th>
                    <th>Ciudad</th>
                    <th>Entrenador</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td class="fw-bold">🏀 {{ $equipo->nombre }}</td>
                    <td>{{ $equipo->ciudad }}</td>
                    <td>{{ $equipo->entrenador }}</td>

                    <td class="text-center">
                        <a href="{{ route('equipos.edit', $equipo->id) }}"
                           class="btn btn-primary btn-sm">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('equipos.destroy', $equipo->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este equipo?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                🗑 Eliminar
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