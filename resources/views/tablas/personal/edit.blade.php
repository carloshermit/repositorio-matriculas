@extends('layout.plantilla')

@section('contenido')
<h1>Editar Registro</h1>
<form method="POST" action="{{ route('personal.update',$personal->codpersonal) }}">
    @method('put')
    @csrf
    <div class="form-group">
    <label for="dni">DNI</label>
    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{$personal->dni}}">
    @error('dni')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nombres">Apellidos y nombres</label>
    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  value="{{$personal->apellidosnombres}}">
    @error('nombres')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$personal->telefono}}">
    @error('telefono')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nroseguro">Nro seguro</label>
    <input type="text" class="form-control @error('nroseguro') is-invalid @enderror" id="nroseguro" name="nroseguro"value="{{$personal->nroseguro}}">
    @error('nroseguro')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="direccion">Direccion</label>
     <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{$personal->direccion}}"">
    @error('direccion')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="estadocivil">Estado civil</label>
     <select class="custom-select" id="Estadocivil">
            <option selected>Estado civil</option>
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
        </select>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection