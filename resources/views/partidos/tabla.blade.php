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
                        <th>PJ</th>
                        <th>PG</th>
                        <th>PP</th>
                        <th>PF</th>
                        <th>PC</th>
                        <th>Dif</th>
                        <th>Pts</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tabla as $index => $fila)
                        <tr>
                            <td class="fw-bold">
                                @if($index == 0)
                                    🥇
                                @elseif($index == 1)
                                    🥈
                                @elseif($index == 2)
                                    🥉
                                @else
                                    {{ $index + 1 }}
                                @endif
                            </td>

                            <td class="fw-bold">🏀 {{ $fila['equipo'] }}</td>
                            <td>{{ $fila['partidos'] }}</td>
                            <td><span class="badge bg-success">{{ $fila['ganados'] }}</span></td>
                            <td><span class="badge bg-danger">{{ $fila['perdidos'] }}</span></td>
                            <td>{{ $fila['favor'] }}</td>
                            <td>{{ $fila['contra'] }}</td>

                            <td>
                                @if($fila['diferencia'] > 0)
                                    <span class="badge bg-success">+{{ $fila['diferencia'] }}</span>
                                @elseif($fila['diferencia'] < 0)
                                    <span class="badge bg-danger">{{ $fila['diferencia'] }}</span>
                                @else
                                    <span class="badge bg-secondary">0</span>
                                @endif
                            </td>

                            <td>
                                <span class="badge bg-warning text-dark fs-6">
                                    {{ $fila['puntos'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-5">
                                <h3>📋</h3>
                                <p class="fw-bold mb-1">No hay datos para mostrar.</p>
                                <small>Registra partidos primero para generar la tabla.</small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection