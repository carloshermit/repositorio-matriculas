@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('personal.store')}}">
    @csrf
    <div class="form-group">
    <label for="dni">DNI</label>
    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
    @error('dni')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nombres">Apellidos y nombres</label>
    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
    @error('nombres')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Ingrese telefono">
    @error('telefono')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nroseguro">Nro seguro</label>
    <input type="text" class="form-control @error('nroseguro') is-invalid @enderror" id="nroseguro" name="nroseguro" placeholder="Ingrese nro seguro">
    @error('nroseguro')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="direccion">Direccion</label>
     <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Ingrese direccion">
    @error('direccion')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="estadocivil">Estado civil</label>
     <select class="custom-select" id="Estadocivil" name="Estadocivil">
            <option selected>Estado civil</option>
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
        </select>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection