@extends('layouts.app')

@section('title', 'Jugadores')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-danger">⛹️ Lista de Jugadores</h1>

    <a href="{{ route('jugadores.create') }}" class="btn btn-success">
        + Registrar Jugador
    </a>
</div>

<div class="mb-3">
    <input
        type="text"
        id="buscarJugador"
        class="form-control"
        placeholder="🔍 Buscar jugador...">
</div>

<div class="card border-0 shadow-sm content-card">
    <div class="card-body">

        <div class="table-responsive">
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

                        <tr class="fila-jugador">

                            <td>{{ $jugador->id }}</td>

                            <td class="fw-bold">
                                {{ $jugador->nombre }}
                            </td>

                            <td>{{ $jugador->edad }}</td>

                            <td>

                                @if($jugador->posicion == 'Base')

                                    <span class="badge bg-primary">
                                        Base
                                    </span>

                                @elseif($jugador->posicion == 'Escolta')

                                    <span class="badge bg-success">
                                        Escolta
                                    </span>

                                @elseif($jugador->posicion == 'Alero')

                                    <span class="badge bg-warning text-dark">
                                        Alero
                                    </span>

                                @elseif($jugador->posicion == 'Ala-Pívot')

                                    <span class="badge bg-info">
                                        Ala-Pívot
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Pívot
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $jugador->equipo->nombre ?? 'Sin equipo' }}
                            </td>

                            <td class="text-center">

                                <a href="{{ route('jugadores.edit', $jugador->id) }}"
                                   class="btn btn-primary btn-sm">
                                    ✏️ Editar
                                </a>

                                <form action="{{ route('jugadores.destroy', $jugador->id) }}"
                                      method="POST"
                                      class="d-inline formulario-eliminar">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
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

</div>

<script>

const buscarJugador = document.getElementById('buscarJugador');

if (buscarJugador) {

    buscarJugador.addEventListener('keyup', function () {

        let texto = this.value.toLowerCase();

        document.querySelectorAll('.fila-jugador').forEach(function(fila){

            if(fila.innerText.toLowerCase().includes(texto)){
                fila.style.display = '';
            }else{
                fila.style.display = 'none';
            }

        });

    });

}

</script>

@endsection