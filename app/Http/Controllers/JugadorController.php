<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::with('equipo')
            ->orderBy('nombre')
            ->get();

        return view('jugadores.index', compact('jugadores'));
    }

    public function create()
    {
        $equipos = Equipo::orderBy('nombre')->get();
        return view('jugadores.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:1|max:60',
            'posicion' => 'required|in:Base,Escolta,Alero,Ala-Pívot,Pívot',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        Jugador::create($request->only('nombre', 'edad', 'posicion', 'equipo_id'));

        return redirect()->route('jugadores.index')
            ->with('success', '✅ Jugador registrado correctamente.');
    }

    public function show(Jugador $jugador)
    {
        $jugador->load('equipo');
        return view('jugadores.show', compact('jugador'));
    }

    public function edit(Jugador $jugador)
    {
        $equipos = Equipo::orderBy('nombre')->get();
        return view('jugadores.edit', compact('jugador', 'equipos'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:1|max:60',
            'posicion' => 'required|in:Base,Escolta,Alero,Ala-Pívot,Pívot',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        $jugador->update($request->only('nombre', 'edad', 'posicion', 'equipo_id'));

        return redirect()->route('jugadores.index')
            ->with('success', '✏️ Jugador actualizado correctamente.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('jugadores.index')
            ->with('success', '🗑 Jugador eliminado correctamente.');
    }
}