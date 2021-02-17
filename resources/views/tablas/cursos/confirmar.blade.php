@extends('layout.plantilla');

@section('contenido')
  <div class="container">
  <h1>Desea eliminar registro ? Codigo : {{$curso->codcurso}} - Nombres : {{$curso->descripcion}}</h1>
    <form method="POST" action="{{ route('curso.destroy', $curso->codcurso)}}">
    @method ('delete')
    @csrf
  <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
  <a href="{{route('cancelar3')}}" class="btn btn-primary" ><i class="fas fa-times-circle"> </button></i>NO</a>
</form>
</div>

@endsection