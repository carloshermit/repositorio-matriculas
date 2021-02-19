@extends('layout.plantilla')

@section('contenido')
<h3>LISTADO DE FAMILIARES</h3>

<th><a href="{{route('matricula.createadd',$alumno->codalumno)}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a> <th>
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
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido materno</th>
                <th scope="col">Nombre primero</th>
                <th scope="col">Nombre otros</th>
                <th scope="col">Celular</th>
                <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
            @foreach($matricula as $itemmatricula)
                
                @endforeach
                @foreach($matricula as $itemmatricula)
                <tr>
                <th>{{$itemmatricula->apellidopaterno}}</th>
                <th>{{$itemmatricula->apellidomaterno}} </th>
                <th>{{$itemmatricula->nombreprimero}} </th>
                <th>{{$itemmatricula->nombreotros}} </th>
                <th>{{$itemmatricula->celular}} </th>
                <td>
                    <a href="{{route('matricula.editadd',$itemmatricula->codfamiliar)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="{{route('matricula.confirmaradd',$itemmatricula->codfamiliar)}}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>   
                @endforeach
            </tbody>
            </table>
@endsection