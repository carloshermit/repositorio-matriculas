<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/bienvenido', function () {
    return view('bienvenido');
});
Route::post('/', 'UserController@login')->name('user.login');
Route::resource('profesor','ProfesorController');
Route::resource('curso','CursoController');
Route::resource('seccion','SeccionController');
Route::resource('personal','PersonalController');
Route::resource('provincia','ProvinciaController');
Route::resource('alumno','AlumnoController');
Route::resource('matricula','MatriculaController');

Route::get('listarGrados/{codNivel}', 'SeccionController@listarGrados');
Route::get('listarSecciones/{codGrado}', 'SeccionController@listarSecciones');
Route::get('listarDepartamentos/{codPais}', 'ProvinciaController@listarDepartamentos');
Route::get('listarProvincias/{codDepartamento}', 'ProvinciaController@listarProvincias');
Route::get('listarDistritos/{codProvincia}', 'ProvinciaController@listarDistritos');
Route::get('buscarAlumno/{codAlumno}', 'MatriculaController@buscarAlumno');

Route::get('seccion/{codseccion}/confirmar','SeccionController@confirmar')->name('seccion.confirmar');
Route::get('curso/{codcurso}/confirmar','CursoController@confirmar')->name('curso.confirmar');
Route::get('personal/{codpersonal}/confirmar','PersonalController@confirmar')->name('personal.confirmar');
Route::get('matricula/{codmatricula}/confirmar','MatriculaController@confirmar')->name('matricula.confirmar');

Route::get('cancelar1',function(){
    return redirect()->route('personal.index')->with('datos','Accion Cancelada ..!');
})->name('cancelar1');
Route::get('cancelar2',function(){
    return redirect()->route('seccion.index')->with('datos','Accion Cancelada ..!');
})->name('cancelar2');
Route::get('cancelar3',function(){
    return redirect()->route('curso.index')->with('datos','Accion Cancelada ..!');
})->name('cancelar3');
Route::get('cancelar4',function(){
    return redirect()->route('alumno.index')->with('datos','Accion Cancelada ..!');
})->name('cancelar4');
Route::get('cancelar5',function(){
    return redirect()->route('matricula.index')->with('datos','Accion Cancelada ..!');
})->name('cancelar5');
Route::get('regresar1',function(){
    return redirect()->route('matricula.index');
})->name('regresar1');

Route::get('matricula/{codmatricula}/add','MatriculaController@add')->name('matricula.add');
Route::get('matricula/{codalumno}/createadd','MatriculaController@createadd')->name('matricula.createadd');
Route::get('matricula/{codalumno}/storeadd','MatriculaController@storeadd')->name('matricula.storeadd');
Route::get('matricula/{codalumno}/editadd','MatriculaController@editadd')->name('matricula.editadd');
Route::get('matricula/{codalumno}/updateadd','MatriculaController@updateadd')->name('matricula.updateadd');
Route::get('matricula/{codmatricula}/confirmaradd','MatriculaController@confirmaradd')->name('matricula.confirmaradd');
Route::get('matricula/{codmatricula}/destroyadd','MatriculaController@destroyadd')->name('matricula.destroyadd');

Route::get('personal/{codpersonal}/add','PersonalController@add')->name('personal.add');
Route::get('personal/{codpersonal}/createadd','PersonalController@createadd')->name('personal.createadd');
Route::get('personal/{codpersonal}/storeadd','PersonalController@storeadd')->name('personal.storeadd');
Route::get('personal/{codpersonal}/editadd','PersonalController@editadd')->name('personal.editadd');
Route::get('personal/{codpersonal}/updateadd','PersonalController@updateadd')->name('personal.updateadd');
Route::get('personal/{codpersonal}/confirmaradd','PersonalController@confirmaradd')->name('personal.confirmaradd');
Route::get('personal/{codpersonal}/destroyadd','PersonalController@destroyadd')->name('personal.destroyadd');


