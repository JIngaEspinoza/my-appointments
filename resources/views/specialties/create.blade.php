@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Especialidades</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('/specialties') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form method="POST" action="{{ url('/specialties') }}">
      @csrf
      <div class="form-group">
        <label for="name">Nombre de la especialidad</label>
        <input class="form-control" placeholder="Nombre especialidad" type="text" name="name" value="{{ old('name') }}" required>
      </div>
      <div class="form-group">
        <label for="description">Descripción</label>
        <input class="form-control" placeholder="Nombre especialidad" type="text" name="description" value="{{ old('description') }}">
      </div>
      <button type="submit" class="btn btn-primary">Guardar especialidad</button>
    </form>
  </div>
</div>
@endsection
