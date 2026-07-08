@extends('layouts.app')

@section('title', 'Partidos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-danger">🏀 Lista de Partidos</h1>

    <a href="{{ route('partidos.create') }}" class="btn btn-success">
        + Registrar Partido
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    @forelse($partidos as $partido)
        @php
            $localGano = $partido->puntos_local > $partido->puntos_visitante;
            $visitanteGano = $partido->puntos_visitante > $partido->puntos_local;
        @endphp

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="fw-bold text-center mb-3">
                        {{ $partido->equipoLocal->nombre }} 
                        <span class="text-danger">VS</span> 
                        {{ $partido->equipoVisitante->nombre }}
                    </h5>

                    <p>
                        <strong>📅 Fecha:</strong>
                        {{ $partido->fecha }}
                    </p>

                    <div class="bg-light rounded p-3 text-center mb-3">
                        <div class="row">
                            <div class="col">
                                <strong>{{ $partido->equipoLocal->nombre }}</strong>
                                <h3 class="{{ $localGano ? 'text-success' : 'text-dark' }}">
                                    {{ $partido->puntos_local }}
                                </h3>

                                @if($localGano)
                                    <span class="badge bg-success">Ganador</span>
                                @endif
                            </div>

                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <strong>-</strong>
                            </div>

                            <div class="col">
                                <strong>{{ $partido->equipoVisitante->nombre }}</strong>
                                <h3 class="{{ $visitanteGano ? 'text-success' : 'text-dark' }}">
                                    {{ $partido->puntos_visitante }}
                                </h3>

                                @if($visitanteGano)
                                    <span class="badge bg-success">Ganador</span>
                                @endif
                            </div>
                        </div>

                        @if($partido->puntos_local == $partido->puntos_visitante)
                            <span class="badge bg-warning text-dark mt-2">Empate</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('partidos.edit', $partido->id) }}" class="btn btn-primary btn-sm">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('partidos.destroy', $partido->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Seguro que deseas eliminar este partido?');">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning">
                No hay partidos registrados todavía.
            </div>
        </div>
    @endforelse
</div>

@endsection