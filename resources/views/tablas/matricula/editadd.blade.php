@extends('layout.plantilla');

@section('contenido')
<h1>Editar Registro</h1>
<form method="GET" action="{{ route('matricula.updateadd',$familiar->codfamiliar)}}">
    @method('put')
    @csrf
    <div class="row">
            <div class="col-3">
                <label for="appaterno">Apellido Paterno</label>
                <input type="text" class="form-control" id="appaterno" name="appaterno"  value="{{$familiar->apellidopaterno}}">
            </div>
            <div class="col-3">
                <label for="apmaterno">Apellido Materno</label>
                <input type="text" class="form-control" id="apmaterno" name="apmaterno"  value="{{$familiar->apellidomaterno}}">
            </div>
            <div class="col-3">
                <label for="primernombre">Primer nombre</label>
                <input type="text" class="form-control" id="primernombre" name="primernombre" value="{{$familiar->nombreprimero}}">
            </div>
            <div class="col-3">
                <label for="otronombres">Otros Nombres</label>
                <input type="text" class="form-control" id="otronombres" name="otronombres"  value="{{$familiar->nombreotros}}">
            </div>
    </div>
    <div class="row">
            <div class="col-3">
                <label for="appaterno">DNI</label>
                <input type="text" class="form-control" id="DNI" name="DNI"  value="{{$familiar->dni}}">
            </div>
            <div class="col-3">
                <label for="appaterno">Relacion</label>
                <select class="custom-select" name="relacion" id="relacion" value="{{$familiar->dni}}">
                <option {{"PADRE" == $familiar->relacion  ? 'selected' : ''}} value="PADRE" >Padre</option>
                <option {{"MADRE" == $familiar->relacion  ? 'selected' : ''}} value="MADRE" >Madre</option>
                <option {{"TUTOR" == $familiar->relacion  ? 'selected' : ''}} value="TUTOR" >Tutor</option>
                </select>
            </div>
            <div class="col-3">
                <label for="appaterno">Celular</label>
                <input type="text" class="form-control" id="Celular" name="Celular" value="{{$familiar->celular}}">
            </div>
            <div class="col-3">
                <input style="visibility:hidden" type="text" class="form-control" id="codalumno" name="codalumno"  value="{{$familiar->codalumno}}">
            </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Grabar</button>
        <a href="{{route('cancelar5')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </div>
</form>
@endsection
@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection