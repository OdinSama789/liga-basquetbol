@extends('layouts.app')

@section('title', 'Registrar Jugador')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">⛹️ Registrar Jugador</h1>
        <p class="text-muted mb-0">Agrega un nuevo jugador a un equipo registrado.</p>
    </div>

    <a href="{{ route('jugadores.index') }}" class="btn btn-outline-dark">
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

        <form action="{{ route('jugadores.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Edad</label>
                <input type="number" name="edad" class="form-control" value="{{ old('edad') }}" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Posición</label>
                <select name="posicion" class="form-select" required>
                    <option value="">Seleccione una posición</option>
                    <option value="Base">Base</option>
                    <option value="Escolta">Escolta</option>
                    <option value="Alero">Alero</option>
                    <option value="Ala-Pívot">Ala-Pívot</option>
                    <option value="Pívot">Pívot</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Equipo</label>
                <select name="equipo_id" class="form-select" required>
                    <option value="">Seleccione un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">
                            {{ $equipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success w-100">
                <i class="bi bi-save"></i> Guardar Jugador
            </button>
        </form>

    </div>
</div>

@endsection