@extends('layouts.app')

@section('title', 'Registrar Partido')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">🏀 Registrar Partido</h1>
        <p class="text-muted mb-0">Registra el marcador de un partido entre dos equipos.</p>
    </div>

    <a href="{{ route('partidos.index') }}" class="btn btn-outline-dark">
        <i class="bi bi-arrow-left"></i> Volver
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Revisa estos errores:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card content-card">
    <div class="card-body">

        <form action="{{ route('partidos.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Equipo Local</label>
                    <select name="equipo_local_id" class="form-select" required>
                        <option value="">Seleccione equipo local</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Equipo Visitante</label>
                    <select name="equipo_visitante_id" class="form-select" required>
                        <option value="">Seleccione equipo visitante</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Puntos Local</label>
                    <input type="number" name="puntos_local" class="form-control" min="0" value="{{ old('puntos_local', 0) }}" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Puntos Visitante</label>
                    <input type="number" name="puntos_visitante" class="form-control" min="0" value="{{ old('puntos_visitante', 0) }}" required>
                </div>
            </div>

            <button class="btn btn-success w-100">
                <i class="bi bi-save"></i> Guardar Partido
            </button>
        </form>

    </div>
</div>

@endsection