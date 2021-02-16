@extends('layout.plantilla')

@section('contenido')
<h3>LISTADO DE ALUMNOS</h3>
<nav class="navbar float-right">
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search" id="buscarpor" name="buscarpor" value={{$buscarpor}} >
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
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumno as $itemalumno)
                <tr>
                <th>{{$itemalumno->codeducando}}</th>
                <th>{{$itemalumno->apellidopaterno}} {{$itemalumno->apellidomaterno}} {{$itemalumno->primernombre}}</th>
                <td>
                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="   " class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>   
                @endforeach
            </tbody>
            </table>
    {{$alumno->links()}}
            
@endsection