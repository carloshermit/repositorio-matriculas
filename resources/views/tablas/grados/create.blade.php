@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{ route('seccion.store')}}">
    @csrf
  <div class="form-group">
  <div class="row">
    <div class="col-4">
    <label for="nombre">Nivel</label>
        <select class="form-control" name="Nivel" id="Nivel">
            <option selected>Seleccion un nivel</option>
            @foreach($nivel as $itemnivel)
            <option value="{{$itemnivel->codnivel}}" >{{$itemnivel->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4">
    <label for="nombre">Grado</label>
        <select class="form-control" id="Grado" name="Grado">
            
        </select>
    </div>
</div>
    <label for="nombre">Seccion</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Ingrese seccion">
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


@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection

