@extends('layout.plantilla')

@section('contenido')
<h3>Agregar catedra</h3>
<form method="POST" action="">
@csrf
<div class="row">
    <div class="col-3">
            <label for="nombre">Grado</label>
            <select class="form-control" id="Grado" name="Grado"> </select>
    </div>
    <div class="col-3">
            <label for="nombre">Seccion</label>
            <select class="form-control" id="Seccion2" name="Seccion2"> </select>
    </div>
    <div class="col-3">
            <label for="nombre">curso</label>
            <select class="form-control" id="Seccion2" name="Seccion2"> </select>
    </div>
</div>
    <button type="submit" class="btn btn-primary">Grabar</button>
</form>
@endsection