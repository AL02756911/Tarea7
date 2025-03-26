<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function create(Asignatura $asignatura)
    {
        return view('actividades.create', compact('asignatura'));
    }

    public function store(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'tipo'                  => 'required|string|max:255',
            'calificacion'          => 'required|numeric',
            'fecha'                 => 'required|date',
            'calificacion_opcional' => 'nullable|numeric',
        ]);

        $asignatura->actividades()->create($request->all());

        return redirect()->route('asignaturas.show', $asignatura)
                         ->with('success', 'Actividad agregada correctamente.');
    }


    public function show(Actividad $actividad)
    {
        $asignatura = $actividad->asignatura;
        return view('actividades.show', compact('actividad', 'asignatura'));
    }

    public function edit(Actividad $actividad)
    {
        $asignatura = $actividad->asignatura;
        return view('actividades.edit', compact('actividad', 'asignatura'));
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'tipo'                  => 'required|string|max:255',
            'calificacion'          => 'required|numeric',
            'fecha'                 => 'required|date',
            'calificacion_opcional' => 'nullable|numeric',
        ]);

        $actividad->update($request->all());

        $asignatura = $actividad->asignatura;
        return redirect()->route('asignaturas.show', $asignatura)
                         ->with('success', 'Actividad actualizada correctamente.');
    }

    public function destroy(Actividad $actividad)
    {
        $asignatura = $actividad->asignatura;
        $actividad->delete();

        return redirect()->route('asignaturas.show', $asignatura)
                         ->with('success', 'Actividad eliminada correctamente.');
    }
}
