@extends('layout.plantilla')

@section('contenido')
<h3>Catedra personal</h3>
<th><a href="{{route('personal.createadd',$personal->codpersonal)}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo Registro</a> <th>
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
                <th scope="col">Curso</th>
                <th scope="col">Grado</th>
                <th scope="col">Seccion</th>
                <th scope="col">Nivel</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catedra as $itemcatedra)
                <tr>
                <th>{{$itemcatedra->curso}}</th>
                <th>{{$itemcatedra->grado}} </th>
                <th>{{$itemcatedra->seccion}} </th>
                <th>{{$itemcatedra->nivel}} </th>
                <td>
                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i>Eliminar</a>
                </td>
                </tr>   
                @endforeach
            </tbody>
            </table>
@endsection