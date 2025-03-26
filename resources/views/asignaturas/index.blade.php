@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Asignaturas</h1>
  <a href="{{ route('asignaturas.create') }}" class="btn btn-success mb-3">Agregar Asignatura</a>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if($asignaturas->count())
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($asignaturas as $asignatura)
        <tr>
          <td>{{ $asignatura->id }}</td>
          <td>{{ $asignatura->nombre }}</td>
          <td>
            <a href="{{ route('asignaturas.show', $asignatura) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('asignaturas.edit', $asignatura) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('asignaturas.destroy', $asignatura) }}" method="POST" style="display:inline-block;">
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
    <p>No hay asignaturas registradas.</p>
  @endif
</div>
@endsection
