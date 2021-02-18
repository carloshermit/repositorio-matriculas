@extends('layout.plantilla');

@section('contenido')
  <div class="container">
  <h1>Desea eliminar registro ? Codigo : {{$matricula->nromatricula}} </h1>
    <form method="POST" action="{{ route('matricula.destroy', $matricula->codmatricula)}}">
    @method ('delete')
    @csrf
  <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
  <a href="{{route('cancelar5')}}" class="btn btn-primary" ><i class="fas fa-times-circle"> </button></i>NO</a>
</form>
</div>

@endsection