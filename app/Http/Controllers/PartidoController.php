<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();

        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();

        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        Partido::create($request->all());

        return redirect()->route('partidos.index');
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::all();

        return view('partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $partido->update($request->all());

        return redirect()->route('partidos.index');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();

        return redirect()->route('partidos.index');
    }

    public function tabla()
    {
        $equipos = Equipo::all();
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
                'ganados' => $ganados,
                'perdidos' => $perdidos,
                'favor' => $favor,
                'contra' => $contra,
            ];
        }

        return view('partidos.tabla', compact('tabla'));
    }
}