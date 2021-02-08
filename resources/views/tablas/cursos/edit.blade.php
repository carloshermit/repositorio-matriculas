@extends('layout.plantilla')

@section('contenido')
<h1>Editar Registro</h1>
<form method="POST" action="{{ route('curso.update',$curso->codcurso) }}">
    @method('put')
    @csrf
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{$curso->codcurso}}" disabled>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{$curso->descripcion}}">
  @error('nombre')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection