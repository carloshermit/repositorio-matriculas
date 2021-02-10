@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="">
    @csrf
  <div class="form-group">
  <div class="row">
    <div class="col-4">
    <label for="nombre">Nivel:</label>
        <select class="custom-select">
            <option selected>Seleccion un nivel</option>
            <option value="1">Inicial</option>
            <option value="2">Primaria</option>
            <option value="3">Secundaria</option>
        </select>
    </div>
    <div class="col-4">
    <label for="nombre">Grado:</label>
        <select class="custom-select">
            <option selected>Seleccione un grado</option>
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
        </select>
    </div>
</div>
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Ingrese nombre">
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