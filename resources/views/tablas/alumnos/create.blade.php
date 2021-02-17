@extends('layout.plantilla')
@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection
@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('alumno.store')}}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label for="codeducando">Código Educando</label>
                <input type="text" class="form-control @error('codeducando') is-invalid @enderror" id="codeducando" name="codeducando"  placeholder="Ingrese Codigo Educando">
                @error('codeducando')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="codmodular">Código Modular</label>
                <input type="text" class="form-control @error('codmodular') is-invalid @enderror" id="codmodular" name="codmodular"  placeholder="Ingrese Codigo Modular">
                @error('codmodular')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="dni">DNI</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="appaterno">Apellido Paterno</label>
                <input type="text" class="form-control @error('appaterno') is-invalid @enderror" id="appaterno" name="appaterno"  placeholder="Ingrese Apellido Paterno">
                @error('appaterno')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="apmaterno">Apellido Materno</label>
                <input type="text" class="form-control @error('apmaterno') is-invalid @enderror" id="apmaterno" name="apmaterno"  placeholder="Ingrese Apellido Materno">
                @error('apmaterno')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="primernombre">Primer nombre</label>
                <input type="text" class="form-control @error('primernombre') is-invalid @enderror" id="primernombre" name="primernombre"  placeholder="Ingrese Primer Nombre">
                @error('primernombre')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="otronombres">Otros Nombres</label>
                <input type="text" class="form-control @error('otronombres') is-invalid @enderror" id="otronombres" name="otronombres"  placeholder="Ingrese Otro Nombre">
                @error('otronombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo" id="sexo">
                    <option selected>Seleccione Sexo</option>
                    <option value="Masculino" >Masculino</option>
                    <option value="Femenino" >Femenino</option>
                </select>
            </div>
            <div class="col-2">
                <label for="fechanac">Fecha de Nac.</label>
                <div class="form-group">                            
                    <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                        <input type="text"  class="form-control" id="fechanac" name="fechanac"
                               value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" style="text-align:center;">
                        <div class="input-group-btn">                                        
                            <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <label for="pais">Pais</label>
                <select class="custom-select" id="Pais">
                    <option selected>Seleccion un pais</option>
                    @foreach($pais as $itempais)
                    <option value="{{$itempais->codpais}}">{{$itempais->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="escala">Escala</label>
                <input type="text" class="form-control @error('escala') is-invalid @enderror" id="escala" name="escala"  placeholder="Ingrese Escala">
                @error('escala')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2">
                <label for="añoingreso">Año de ingreso</label>
                <input type="text" class="form-control @error('añoingreso') is-invalid @enderror" id="añoingreso" name="añoingreso"  placeholder="Ingrese Año Ingreso">
                @error('añoingreso')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="departamento">Departamento</label>
                <select class="custom-select" id="Departamento">
                </select>
            </div>
            <div class="col-4">
                <label for="provincia">Provincia</label>
                <select class="custom-select" id="Provincia">
                </select>
            </div>
            <div class="col-4">
                <label for="distrito">Distrito</label>
                <select class="custom-select" id="Distrito" name="Distrito">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="lenguamat">Lengua Materna</label>
                <select class="custom-select" id="lenguamat" name="lenguamat">
                    <option selected>Lengua Materna</option>
                    <option value="1">Castellano</option>
                    <option value="2">Quechua</option>
                </select>
            </div>
            <div class="col-4">
                <label for="estadocivil">Estado Civil</label>
                <select class="custom-select" id="estadocivil" name="estadocivil">
                    <option selected>Estado Civil</option>
                    <option value="SOLTERO">SOLTERO</option>
                    <option value="CASADO">CASADO</option>
                </select>
            </div>
            <div class="col-4">
                <label for="codreligion">Religion</label>
                <select class="custom-select" id="codreligion" name="codreligion">
                    <option selected>Religion</option>
                    <option value="1">CATOLICO</option>
                    <option value="2">ATEO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="fechabautizo">Fecha Bautizo</label>
                <div class="form-group">                            
                    <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                        <input type="text"  class="form-control" id="fechabautizo" name="fechabautizo"
                               style="text-align:center;">
                        <div class="input-group-btn">                                        
                            <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <label for="parroquiabautizo">Parroquia de Bautizo</label>
                <input type="text" class="form-control @error('parroquiabautizo') is-invalid @enderror" id="parroquiabautizo" name="parroquiabautizo"  placeholder="Ingrese Parroquia de Bautizo">
                @error('parroquiabautizo')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="colegioprocedencia">Colegio Procedencia</label>
                <input type="text" class="form-control @error('colegioprocedencia') is-invalid @enderror" id="colegioprocedencia" name="colegioprocedencia"  placeholder="Ingrese Colegio de Procedencia">
                @error('colegioprocedencia')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
  <button type="submit" class="btn btn-primary">Grabar</button>
  <a href="" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>
@endsection
@section('script')
    <script src="/js/scripts.js">
    </script>    
    <script src="/select2/bootstrap-select.min.js"></script>     
     <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
     <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script> 
@endsection