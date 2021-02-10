@extends('layout.plantilla')

@section('contenido')
<h3>LISTADO DE SECCIONES</h3>
<div class="row">
    <div class="col-4">
        <select class="custom-select" id="Nivel">
            <option selected>Seleccion un nivel</option>
            @foreach($nivel as $itemnivel)
            <option value="{{$itemnivel->codnivel}}">{{$itemnivel->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4">
        <select class="custom-select" id="Grado">
            
        </select>
    </div>
</div>
<a href="{{route('seccion.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a>
<nav class="navbar float-right">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search" id="buscarpor" name="buscarpor" value="" >
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>     
</nav>
@if(session('datos'))
<div class="alert alert-warning alert-dismissile fade show mt-3" role="alert">
    {{session ('datos') }}
    <button class="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table class="table">
            <thead class="thead-dark">
                <tr>
                
                <th scope="col">Seccion</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="Seccion">
                
            </tbody>
            </table>
                
@endsection

@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection