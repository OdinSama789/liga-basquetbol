<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')->get();

        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::all();

        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        Jugador::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'posicion' => $request->posicion,
            'equipo_id' => $request->equipo_id,
        ]);

        return redirect()->route('jugadores.index');
    }

    public function show(Jugador $jugador)
    {
        //
    }

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::all();

        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $jugador->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'posicion' => $request->posicion,
            'equipo_id' => $request->equipo_id,
        ]);

        return redirect()->route('jugadores.index');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('jugadores.index');
    }

    public function tabla()
{
    $equipos = \App\Models\Equipo::all();

    $tabla = [];

    foreach ($equipos as $equipo) {

        $ganados = 0;
        $perdidos = 0;
        $favor = 0;
        $contra = 0;

        $partidosLocal = \App\Models\Partido::where('equipo_local_id', $equipo->id)->get();

        foreach ($partidosLocal as $partido) {

            $favor += $partido->puntos_local;
            $contra += $partido->puntos_visitante;

            if ($partido->puntos_local > $partido->puntos_visitante) {
                $ganados++;
            } else {
                $perdidos++;
            }
        }

        $partidosVisitante = \App\Models\Partido::where('equipo_visitante_id', $equipo->id)->get();

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
            'ganados' => $ganados,
            'perdidos' => $perdidos,
            'favor' => $favor,
            'contra' => $contra,
        ];
    }

    return view('partidos.tabla', compact('tabla'));
}
}