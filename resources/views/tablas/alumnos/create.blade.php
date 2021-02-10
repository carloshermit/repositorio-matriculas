@extends('layout.plantilla')

@section('contenido')
<h1>Crear Registro</h1>
<form method="POST" action="{{route('alumno.store')}}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label for="dni">Código Educando</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="dni">Código Modular</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
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
                <label for="nombres">Apellido Paterno</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="nombres">Apellido Materno</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="nombres">Primer nombre</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-3">
                <label for="nombres">Otros Nombres</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label for="nombres">Sexo</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2">
                <label for="nombres">Fecha de Nac.</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="nombres">Pais</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2">
                <label for="nombres">Escala</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-2">
                <label for="nombres">Año de ingreso</label>
                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres"  placeholder="Ingrese apellidos y nombres">
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="dni">Departamento</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="dni">Provincia</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="dni">Distrito</label>
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
                <label for="dni">Lengua Materna</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror    
            </div>
            <div class="col-4">
                <label for="dni">Estado Civil</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni"  placeholder="Ingrese DNI">
                @error('dni')
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