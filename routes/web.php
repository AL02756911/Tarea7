<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ActividadController;

Route::resource('asignaturas', AsignaturaController::class);
Route::resource('asignaturas.actividades', ActividadController::class)->shallow()->parameters(['actividades' => 'actividad']);

