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
Route::get('listarGrados/{codNivel}', 'SeccionController@listarGrados');
Route::get('listarSecciones/{codGrado}', 'SeccionController@listarSecciones');


Route::get('curso/{codcurso}/confirmar','CursoController@confirmar')->name('curso.confirmar');