<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])
            ->orderBy('fecha', 'desc')
            ->get();
        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date',
            'puntos_local' => 'required|integer|min:0',
            'puntos_visitante' => 'required|integer|min:0',
        ]);

        Partido::create($request->only(
            'equipo_local_id',
            'equipo_visitante_id',
            'fecha',
            'puntos_local',
            'puntos_visitante'
        ));

        return redirect()->route('partidos.index')
            ->with('success', 'Partido registrado correctamente.');
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id|different:equipo_local_id',
            'fecha' => 'required|date',
            'puntos_local' => 'required|integer|min:0',
            'puntos_visitante' => 'required|integer|min:0',
        ]);

        $partido->update($request->only(
            'equipo_local_id',
            'equipo_visitante_id',
            'fecha',
            'puntos_local',
            'puntos_visitante'
        ));

        return redirect()->route('partidos.index')
            ->with('success', 'Partido actualizado correctamente.');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();
        return redirect()->route('partidos.index')
            ->with('success', 'Partido eliminado correctamente.');
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
        

        return view('partidos.tabla', compact('tabla'));
    }
}