@extends('layout.plantilla')

@section('contenido')
<h3>Agregar catedra</h3>
<form method="GET" action="{{ route('personal.storeadd',$personal->codpersonal)}}">
@csrf
<div class="row">
    <div class="col-3">
        <label for="nombre">Grado</label>
        <select class="form-control" id="Grado" name="Grado"> 
        @foreach($grado as $itemgrado)
            <option value="{{$itemgrado->codgrado}}">{{$itemgrado->descripcion}}</option>
        @endforeach
        </select>
    </div>
    <div class="col-3">
        <label for="nombre">Seccion</label>
        <select class="form-control" id="Seccion2" name="Seccion2"> 
        </select>
    </div>
    <div class="col-3">
        <label for="nombre">Curso</label>
        <select class="form-control" id="Curso" name="Curso"> 
        @foreach($curso as $itemcurso)
            <option value="{{$itemcurso->codcurso}}">{{$itemcurso->descripcion}}</option>
        @endforeach
        </select>
    </div>
    <div class="col-3">
        <input style="visibility:hidden" type="text" class="form-control" id="codpersonal" name="codpersonal"  value="{{$personal->codpersonal}}">
    </div>
</div>
<button type="submit" class="btn btn-primary">Grabar</button>
<a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection

@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection