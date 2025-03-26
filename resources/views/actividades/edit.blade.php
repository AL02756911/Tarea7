@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Editar Actividad de {{ $asignatura->nombre }}</h1>
  <form action="{{ route('actividades.update', $actividad) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="tipo">Tipo de Actividad</label>
      <input type="text" name="tipo" class="form-control" value="{{ $actividad->tipo }}" required>
    </div>
    <div class="form-group">
      <label for="calificacion">Calificacion</label>
      <input type="number" step="0.01" name="calificacion" class="form-control" value="{{ $actividad->calificacion }}" required>
    </div>
    <div class="form-group">
      <label for="fecha">Fecha</label>
      <input type="date" name="fecha" class="form-control" value="{{ $actividad->fecha }}" required>
    </div>
    <div class="form-group">
      <label for="calificacion_opcional">Calificacion Opcional (opcional)</label>
      <input type="number" step="0.01" name="calificacion_opcional" class="form-control" value="{{ $actividad->calificacion_opcional }}">
    </div>
    <button type="submit" class="btn btn-success mt-3">Actualizar</button>
  </form>
  <a href="{{ route('asignaturas.show', $asignatura) }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
