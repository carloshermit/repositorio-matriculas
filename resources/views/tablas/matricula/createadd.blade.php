@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
@foreach($matricula as $itemmatricula)
@endforeach
<form method="GET" action="{{ route('matricula.storeadd',$itemmatricula->codalumno)}}">
    @csrf
    <div class="row">
            <div class="col-3">
                <label for="appaterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="appaterno" name="appaterno"  placeholder="Ingrese Apellido Paterno">
            </div>
            <div class="col-3">
                <label for="apmaterno">Apellido Materno</label>
                <input type="text" class="form-control" id="apmaterno" name="apmaterno"  placeholder="Ingrese Apellido Materno">
            </div>
            <div class="col-3">
                <label for="primernombre">Primer nombre</label>
                <input type="text" class="form-control" id="primernombre" name="primernombre"  placeholder="Ingrese Primer Nombre">
            </div>
            <div class="col-3">
                <label for="otronombres">Otros Nombres</label>
                <input type="text" class="form-control" id="otronombres" name="otronombres"  placeholder="Ingrese Otro Nombre">
            </div>
    </div>
    <div class="row">
            <div class="col-3">
                <label for="appaterno">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI"  placeholder="Ingrese Apellido Paterno">
            </div>
            <div class="col-3">
                <label for="appaterno">Celular</label>
                <input type="text" class="form-control" id="Celular" name="Celular"  placeholder="Ingrese Apellido Paterno">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="codalumno" name="codalumno"  value="{{$itemmatricula->codalumno}}">
            </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Grabar</button>
        <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </div>
</form>
@endsection
@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection