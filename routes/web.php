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