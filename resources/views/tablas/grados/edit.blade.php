@extends('layout.plantilla')

@section('contenido')
<h1>Editar Registro</h1>
<form method="POST" action="{{ route('seccion.update',$seccion->codseccion) }}">
    @method('put')
    @csrf
  <div class="form-group">
    <label for="nombre">Seccion</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{$seccion->descripcion}}">
    @error('nombre')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar2')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection