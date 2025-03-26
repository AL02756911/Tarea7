@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Editar Asignatura</h1>
  <form action="{{ route('asignaturas.update', $asignatura) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nombre">Nombre de la Asignatura</label>
      <input type="text" name="nombre" class="form-control" value="{{ $asignatura->nombre }}" required>
    </div>
    <button type="submit" class="btn btn-success mt-3">Actualizar</button>
  </form>
  <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
