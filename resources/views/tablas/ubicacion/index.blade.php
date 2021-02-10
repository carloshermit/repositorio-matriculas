@extends('layout.plantilla')

@section('contenido')
<h3>LISTADO DE PROVINCIAS</h3>
<div class="row">
    <div class="col-4">
        <select class="custom-select" id="Pais">
            <option selected>Seleccion un pais</option>
            @foreach($pais as $itempais)
            <option value="{{$itempais->codpais}}">{{$itempais->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-4">
        <select class="custom-select" id="Departamento">
            
        </select>
    </div>
</div>
<nav class="navbar float-right">

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
                <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody id="Provincia">
            </tbody>
            </table>
@endsection
@section('script')
    <script src="/js/scripts.js">
    </script>     
@endsection