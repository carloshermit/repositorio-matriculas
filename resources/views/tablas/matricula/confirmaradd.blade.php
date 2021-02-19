@extends('layout.plantilla');

@section('contenido')
  <div class="container">
  <h1>Desea eliminar registro ? Codigo : {{$familiar->dni}} - Nombres : {{$familiar->apellidopaterno}}</h1>
    <form method="GET" action="{{ route('matricula.destroyadd', $familiar->codfamiliar)}}">
    @method ('delete')
    @csrf
  <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
  <a href="{{route('cancelar3')}}" class="btn btn-primary" ><i class="fas fa-times-circle"> </button></i>NO</a>
</form>
</div>

@endsection