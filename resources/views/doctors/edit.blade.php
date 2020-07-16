@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Editar médico</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('/doctors') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
    <form method="POST" action="{{ url('/doctors/'.$doctor->id) }}">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nombre del médico</label>
        <input class="form-control" placeholder="" type="text" name="name" value="{{ old('name', $doctor->name) }}" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control" placeholder="" type="text" name="email" value="{{ old('email', $doctor->email) }}">
      </div>
      <div class="form-group">
        <label for="dni">DNI</label>
        <input class="form-control" placeholder="" type="text" name="dni" value="{{ old('dni', $doctor->dni) }}">
      </div>
      <div class="form-group">
        <label for="address">Dirección</label>
        <input class="form-control" placeholder="" type="text" name="address" value="{{ old('address', $doctor->address) }}">
      </div>
      <div class="form-group">
        <label for="phone">Teléfono/Móvil</label>
        <input class="form-control" placeholder="" type="text" name="phone" value="{{ old('phone', $doctor->phone) }}">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</em></label>
        <input class="form-control" placeholder="" type="text" name="password" value="">
        <p>Ingrese un valor sólo si desea modificar la contraseña.</p>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
@endsection
