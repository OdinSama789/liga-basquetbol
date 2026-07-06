@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">🏀 Perfil del Jugador</h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <h4>{{ $jugador->nombre }}</h4>

                    <hr>

                    <p><strong>Edad:</strong> {{ $jugador->edad }} años</p>

                    <p><strong>Posición:</strong> {{ $jugador->posicion }}</p>

                    <p><strong>Equipo:</strong> {{ $jugador->equipo->nombre }}</p>

                </div>

            </div>

            <a href="{{ route('jugadores.index') }}" class="btn btn-primary mt-3">
                ← Volver
            </a>

        </div>

    </div>

</div>

@endsection