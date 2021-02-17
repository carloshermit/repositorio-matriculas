@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('personal.store')}}">
    @csrf
    <div class="form-group">
    <label for="dni">DNI</label>
    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
    @error('dni')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nombres">Apellidos y nombres</label>
    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{old('nombres')}}" placeholder="Ingrese apellidos y nombres">
    @error('nombres')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Ingrese telefono">
    @error('telefono')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="nroseguro">Nro seguro</label>
    <input type="text" class="form-control @error('nroseguro') is-invalid @enderror" id="nroseguro" name="nroseguro" placeholder="Ingrese nro seguro">
    @error('nroseguro')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="direccion">Direccion</label>
     <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Ingrese direccion">
    @error('direccion')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="estadocivil">Estado civil</label>
     <select class="form-control" id="Estadocivil" name="Estadocivil">
            <option selected>Estado civil</option>
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
        </select>
  </div>
    <div class="form-group">
    <label for="departamento">Departamento</label>
     <select class="form-control" id="departamento" name="departamento">
        <option selected>Seleccion un departamento</option>
          @foreach($nivel as $itemnivel)
            <option value="{{$itemnivel->codnivel}}">{{$itemnivel->descripcion}}</option>
          @endforeach
        </select>
  </div>
    <div class="form-group">
    <label for="añoingreso">Año ingreso</label>
     <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
      <input type="text"  class="form-control" id="añoingreso" name="añoingreso"
        value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" style="text-align:center;">
          <div class="input-group-btn">                                        
            <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
          </div>
      </div>
  </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection


@section('script')
    <script src="/select2/bootstrap-select.min.js"></script>     
     <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
     <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script> 
@endsection