@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('profesor.store')}}">
    @csrf
  <div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" aria-describedby="emailHelp" placeholder="Ingrese nombres">
    @error('nombres')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection