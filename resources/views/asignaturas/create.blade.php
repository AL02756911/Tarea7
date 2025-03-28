@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Agregar Asignatura</h1>
  <form action="{{ route('asignaturas.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="nombre">Nombre de la Asignatura</label>
      <input type="text" name="nombre" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Guardar</button>
  </form>
  <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
