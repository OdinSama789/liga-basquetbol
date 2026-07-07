@extends('layouts.app')

@section('title', 'Crear Equipo')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h1 class="text-center text-success fw-bold mb-4">
                    🏀 Registrar Equipo
                </h1>

                <form action="{{ route('equipos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre del equipo</label>
                        <input type="text" name="nombre" class="form-control"
                               placeholder="Ejemplo: Lakers Abancay" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control"
                               placeholder="Ejemplo: Abancay" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Entrenador</label>
                        <input type="text" name="entrenador" class="form-control"
                               placeholder="Ejemplo: Carlos Ramos" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        💾 Guardar Equipo
                    </button>
                </form>

                <a href="{{ route('equipos.index') }}" class="btn btn-secondary w-100 mt-3">
                    ← Volver
                </a>

            </div>
        </div>

    </div>
</div>

@endsection