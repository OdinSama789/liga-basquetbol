<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'entrenador' => 'required',
        ]);
        Equipo::create([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'entrenador' => $request->entrenador,
        ]);

        return redirect()->route('equipos.index');
    }

    public function show(Equipo $equipo)
    {
        //
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $equipo->update([
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'entrenador' => $request->entrenador,
        ]);

        return redirect()->route('equipos.index');
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index');
    }
}