@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $asignatura->nombre }}</h1>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('asignaturas.actividades.create', $asignatura) }}" class="btn btn-success mb-3">Agregar Actividad</a>
  @if($asignatura->actividades->count())
    <table class="table">
      <thead>
        <tr>
          <th>Tipo de Actividad</th>
          <th>Calificacion</th>
          <th>Fecha</th>
          <th>Calificacion Opcional</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($asignatura->actividades as $actividad)
        <tr>
          <td>{{ $actividad->tipo }}</td>
          <td>{{ $actividad->calificacion }}</td>
          <td>{{ $actividad->fecha }}</td>
          <td>{{ $actividad->calificacion_opcional ?? '-' }}</td>
          <td>
            <a href="{{ route('actividades.edit', $actividad) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('actividades.destroy', $actividad) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Estas seguro?')">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>No hay actividades registradas para esta asignatura.</p>
  @endif
  <a href="{{ route('asignaturas.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
