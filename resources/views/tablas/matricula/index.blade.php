@extends('layout.plantilla')
@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection
@section('contenido')
<h1>Crear Registro Matricula</h1>
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
        </div>
@endsection