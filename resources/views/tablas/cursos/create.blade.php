@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('curso.store')}}">
    @csrf
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"  placeholder="Ingrese nombre">
    @error('nombre')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar3')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection