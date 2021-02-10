<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Seccion;
use DB;

class SeccionController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $nivel=DB::table('nivel')->orderBy('codnivel', 'asc')->get();
        $grado=DB::table('grado')->get();
        $buscarpor=$request->buscarpor;
        $seccion=DB::table('seccion')
        ->orderBy('codseccion', 'asc')
        ->where('descripcion','like','%'.$buscarpor.'%')
        ->select('codseccion','descripcion')->paginate($this::PAGINATION);
        return view('tablas/grados/index',compact('nivel','seccion','buscarpor'));
    }
    public function create()
    {
        return view('tablas/grados.create');
    }
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        $curso=Curso::findOrFail($id);
        return view('tablas/cursos.edit',compact('curso'));
    }
    public function listarGrados($codNivel)
    {   
        return DB::table('grado')
        ->where('codnivel','=',$codNivel)->select('codgrado','descripcion')->get(); 
    }
    public function listarSecciones($codGrado)
    {   
        return DB::table('seccion')
        ->where('codgrado','=',$codGrado)->select('codseccion','descripcion')->get(); 
    }
}
