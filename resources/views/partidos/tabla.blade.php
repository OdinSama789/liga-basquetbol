@extends('layouts.app')

@section('title', 'Tabla de Posiciones')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">🏆 Tabla de Posiciones</h1>
        <p class="text-muted mb-0">Clasificación general de equipos según partidos registrados.</p>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">
        <i class="bi bi-arrow-left"></i> Dashboard
    </a>
</div>

<div class="card content-card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Equipo</th>
                        <th>PG</th>
                        <th>PP</th>
                        <th>PF</th>
                        <th>PC</th>
                        <th>DIF</th>
                        <th>PTS</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tabla as $index => $fila)
                        <tr>
                            <td class="fw-bold">{{ $index + 1 }}</td>
                            <td class="fw-bold">🏀 {{ $fila['equipo'] }}</td>
                            <td><span class="badge bg-success">{{ $fila['ganados'] }}</span></td>
                            <td><span class="badge bg-danger">{{ $fila['perdidos'] }}</span></td>
                            <td>{{ $fila['favor'] }}</td>
                            <td>{{ $fila['contra'] }}</td>
                            <td>{{ $fila['favor'] - $fila['contra'] }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    {{ $fila['ganados'] * 2 }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No hay datos para mostrar. Registra partidos primero.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection