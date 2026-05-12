<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

//Route::get() ---abrir pagina
Route::get('/', function () {
    return view('welcome');
});

// Mostrar lista de equipos
Route::get('/equipos', [EquipoController::class, 'index'])
    ->name('equipos.index');

// Mostrar formulario
Route::get('/equipos/create', [EquipoController::class, 'create'])
    ->name('equipos.create');

// Guardar equipo
//Route::post(...) --enviar formularo/guardar datos
Route::post('/equipos', [EquipoController::class, 'store'])
    ->name('equipos.store');

// Mostrar formulario editar
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])
    ->name('equipos.edit');

// Actualizar equipo
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])
    ->name('equipos.update');

// Eliminar equipo
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])
    ->name('equipos.destroy');