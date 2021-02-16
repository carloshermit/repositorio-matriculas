<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Matricula;
use DB;

class MatriculaController extends Controller
{
    public function index(Request $request)
    {
        $nivel=DB::table('alumno_seccion')->orderBy('codalumnoseccion', 'asc')->get();
        return view('tablas\matricula\index',compact('matricula'));
    }
}
