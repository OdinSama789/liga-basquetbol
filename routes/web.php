<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartidoController;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Partido;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $totalEquipos = Equipo::count();
    $totalJugadores = Jugador::count();
    $totalPartidos = Partido::count();

    $equipos = Equipo::withCount('jugadores')
        ->orderBy('nombre')
        ->get();

    $ultimosJugadores = Jugador::with('equipo')
        ->latest()
        ->take(5)
        ->get();

    $ultimosPartidos = Partido::with(['equipoLocal', 'equipoVisitante'])
        ->orderBy('fecha', 'desc')
        ->take(5)
        ->get();

    $tabla = [];

    foreach ($equipos as $equipo) {
        $ganados = 0;
        $perdidos = 0;
        $favor = 0;
        $contra = 0;

        $partidosLocal = Partido::where('equipo_local_id', $equipo->id)->get();

        foreach ($partidosLocal as $partido) {
            $favor += $partido->puntos_local;
            $contra += $partido->puntos_visitante;

            if ($partido->puntos_local > $partido->puntos_visitante) {
                $ganados++;
            } else {
                $perdidos++;
            }
        }

        $partidosVisitante = Partido::where('equipo_visitante_id', $equipo->id)->get();

        foreach ($partidosVisitante as $partido) {
            $favor += $partido->puntos_visitante;
            $contra += $partido->puntos_local;

            if ($partido->puntos_visitante > $partido->puntos_local) {
                $ganados++;
            } else {
                $perdidos++;
            }
        }

        $tabla[] = [
            'equipo' => $equipo->nombre,
            'jugadores' => $equipo->jugadores_count,
            'partidos' => $ganados + $perdidos,
            'ganados' => $ganados,
            'perdidos' => $perdidos,
            'favor' => $favor,
            'contra' => $contra,
            'diferencia' => $favor - $contra,
            'puntos' => $ganados * 2,
        ];
    }

    usort($tabla, function ($a, $b) {
        return $b['puntos'] <=> $a['puntos']
            ?: $b['diferencia'] <=> $a['diferencia']
            ?: $b['favor'] <=> $a['favor'];
    });

    $lider = $tabla[0]['equipo'] ?? 'Sin líder';

    return view('dashboard', compact(
        'totalEquipos',
        'totalJugadores',
        'totalPartidos',
        'equipos',
        'ultimosJugadores',
        'ultimosPartidos',
        'tabla',
        'lider'
    ));
})->name('dashboard');

// Rutas de equipos
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

// Rutas de jugadores
Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
Route::get('/jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
Route::get('/jugadores/{jugador}', [JugadorController::class, 'show'])->name('jugadores.show');
Route::get('/jugadores/{jugador}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
Route::put('/jugadores/{jugador}', [JugadorController::class, 'update'])->name('jugadores.update');
Route::delete('/jugadores/{jugador}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');

// Rutas de partidos
Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
Route::get('/partidos/{partido}/edit', [PartidoController::class, 'edit'])->name('partidos.edit');
Route::put('/partidos/{partido}', [PartidoController::class, 'update'])->name('partidos.update');
Route::delete('/partidos/{partido}', [PartidoController::class, 'destroy'])->name('partidos.destroy');

Route::get('/tabla-posiciones', [PartidoController::class, 'tabla'])
    ->name('tabla.posiciones');