@extends('layout.plantilla')
@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection
@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('matricula.store')}}">
@csrf
<div class="form-group">
    <div class="row">
        <div class="col-3">
            <label for="nombre">Codigo Alumno</label>
            <input type="text" class="form-control" id="codalumno" name="codalumno"  placeholder="Codigo Alumno">
        </div>
        <div class="col-3">
            <nav class="navbar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="FbotonOn(this)">Buscar</button>
            </nav>
        </div>
        <div class="col-3">
            <label for="nombre">Numero Matricula</label>
            <input type="text" class="form-control" id="nromatricula" name="nromatricula"  placeholder="Numero Matricula">
        </div>
        <div class="col-3">
            <label for="nombre">Fecha</label>
            <div class="form-group">                            
                <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                    <input type="text"  class="form-control" id="fechamatricula" name="fechamatricula"
                        value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" style="text-align:center;">
                    <div class="input-group-btn">                                        
                        <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="nombre">Apellido Paterno</label>
            <input type="text" class="form-control" id="appaterno" name="appaterno"  disabled>
        </div>
        <div class="col-3">
            <label for="nombre">Apellido Materno</label>
            <input type="text" class="form-control" id="apmaterno" name="apmaterno"  disabled>
        </div>
        <div class="col-3">
            <label for="nombre">Primer nombre</label>
            <input type="text" class="form-control" id="nombre1" name="nombre1"  disabled>
        </div>
        <div class="col-3">
            <label for="nombre">Otros nombres</label>
            <input type="text" class="form-control" id="nombre2" name="nombre2"  disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="nombre">Nivel</label>
            <select class="custom-select" name="" id="Nivel">
                @foreach($nivel as $itemnivel)
                    <option value="{{$itemnivel->codnivel}}">{{$itemnivel->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="nombre">Grado</label>
            <select class="form-control" id="Grado" name="Grado"> </select>
        </div>
        <div class="col-3">
            <label for="nombre">Seccion</label>
            <select class="form-control" id="Seccion2" name="Seccion2"> </select>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="nombre">Escala</label>
            <input type="text" class="form-control" id="escala" name="escala"  placeholder="Ingrese Año Ingreso">
        </div>
        <div class="col-3">
            <label for="nombre">Año</label>
            <input type="text" class="form-control" id="añoingreso" name="añoingreso"  placeholder="Ingrese Año Ingreso">
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Grabar</button>
<a href="{{route('cancelar5')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection
@section('script')
    <script src="/js/scripts.js">
    </script>    
    <script src="/select2/bootstrap-select.min.js"></script>     
     <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
     <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script>  
@endsection
