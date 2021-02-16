@extends('layout.plantilla')

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
                <input type="text" class="form-control @error('codmodular') is-invalid @enderror" id="dnicodmodular" name="codmodular"  placeholder="Ingrese Codigo Modular">
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
                <select class="form-control" name="Nivel" id="Nivel">
                    <option selected>Seleccione Sexo</option>
                    <option value="Masculino" >Masculino</option>
                    <option value="Femenino" >Femenino</option>
                </select>
            </div>
            <div class="col-2">
                <label for="fechanac">Fecha de Nac.</label>
                <input type="text" class="form-control @error('fechanac') is-invalid @enderror" id="fechanac" name="fechanac"  placeholder="Ingrese Fecha de Nacimiento">
                @error('fechanac')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                <select class="custom-select" id="Distrito">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="lenguamat">Lengua Materna</label>
                <input type="text" class="form-control @error('lenguamat') is-invalid @enderror" id="lenguamat" name="lenguamat"  placeholder="Ingrese Lengua Materna">
                @error('lenguamat')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="estadocivil">Estado Civil</label>
                <input type="text" class="form-control @error('estadocivil') is-invalid @enderror" id="estadocivil" name="estadocivil"  placeholder="Ingrese Estado Civil">
                @error('estadocivil')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="dni">Religion</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="dni">Fecha Bautizo</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="dni">Parroquia de Bautizo</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="dni">Colegio Procedencia</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
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
@endsection