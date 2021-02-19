@extends('layout.plantilla')
@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection
@section('contenido')
<h1>Editar Registro</h1>
<form method="POST" action="{{ route('personal.update',$personal->codpersonal) }}">
    @method('put')
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-2">
                <label for="dni">DNI</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{$personal->dni}}">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
              <label for="nombres">Apellidos y nombres</label>
              <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  value="{{$personal->apellidosnombres}}">
              @error('nombres')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-3">
              <label for="telefono">Telefono</label>
              <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$personal->telefono}}">
              @error('telefono')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-3">
              <label for="nroseguro">Nro seguro</label>
              <input type="text" class="form-control @error('nroseguro') is-invalid @enderror" id="nroseguro" name="nroseguro"value="{{$personal->nroseguro}}">
              @error('nroseguro')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">    
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{$personal->direccion}}"">
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-2">
                <label for="estadocivil">Estado civil</label>
                <select class="form-control" id="estadocivil" name="estadocivil">
                        <option {{"soltero" == $personal->estadocivil  ? 'selected' : ''}} value="soltero">Soltero</option>
                        <option  {{"casado" == $personal->estadocivil  ? 'selected' : ''}} value="casado">Casado</option>
                    </select>
              </div>
              <div class="col-3">
                <label for="departamento">Departamento</label>
                <select class="form-control" id="departamento" name="departamento">
                      @foreach($nivel as $itemnivel)
                        <option {{$itemnivel->codnivel == $personal->coddepartamentoa  ? 'selected' : ''}} value="{{$itemnivel->codnivel}}" >{{$itemnivel->descripcion}}</option>
                      @endforeach
                    </select>
              </div>
                <div class="col-4">
                <label for="añoingreso">Año ingreso</label>
                <div class="input-group date form_date " data-date-format="yyyy/mm/dd" data-provide="datepicker">
                  <input type="text"  class="form-control" id="añoingreso" name="añoingreso"
                    value="{{$personal->fechaingreso}} " style="text-align:center;">
                      <div class="input-group-btn">                                        
                        <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                      </div>
                  </div>
              </div>
          </div>
    </div>


  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="{{route('cancelar1')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection
@section('script')
    <script src="/select2/bootstrap-select.min.js"></script>     
    <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
    <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script> 
@endsection
