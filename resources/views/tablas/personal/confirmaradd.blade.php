@extends('layout.plantilla');

@section('contenido')
  <div class="container">
  <h1>Desea eliminar registro ? </h1>
    <form method="GET" action="{{ route('personal.destroyadd', $catedra->codcatedra)}}">
    @method ('delete')
    @csrf
  <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
  <a href="{{route('cancelar1')}}" class="btn btn-primary" ><i class="fas fa-times-circle"> </button></i>NO</a>
</form>
</div>

@endsection