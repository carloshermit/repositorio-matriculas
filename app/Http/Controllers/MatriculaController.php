<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Matricula;
use App\Seccion;
use App\Alumno;
use App\Grado;
use App\Nivel;
use DB;

class MatriculaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $matricula= DB::table('matricula as m')->join('alumno as a','a.codalumno','=','m.codalumno')
        ->join('seccion as s','m.codseccion','=','s.codseccion')
        ->join('grado as g','g.codgrado','=','s.codgrado')
        ->join('nivel as n','n.codnivel','=','g.codnivel')
        ->where('m.nromatricula','ilike','%'.$buscarpor.'%')
        ->select('m.codmatricula','m.nromatricula','a.apellidopaterno','a.apellidomaterno','a.primernombre','a.otrosnombres','s.descripcion as seccion','g.descripcion as grado','n.descripcion as nivel')
        ->paginate($this::PAGINATION); 
        return view('tablas/matricula/index',compact('matricula','buscarpor'));
    }
    public function create(Request $request)
    {   
        $nivel=DB::table('nivel')->get();
        return view('tablas/matricula.create',compact('nivel'));
    }
    public function store(Request $request)
    {   
        $alumno=DB::table('alumno')
        ->select('codalumno')
        ->where('codeducando','=',$request->codalumno)->first();
        $matricula=new Matricula();
        $matricula->codalumno=$alumno->codalumno;
        $matricula->codseccion=$request->Seccion2;
        $matricula->fecha=$request->fechamatricula;
        $matricula->escala=$request->escala;
        $matricula->añoingreso=$request->añoingreso;
        $matricula->nromatricula=$request->nromatricula;
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos','Registro Nuevo Guardado!!');
    }
    public function edit($id)
    {
        $nivel=DB::table('nivel')->get();
        $matricula=DB::table('matricula as m')->join('alumno as a','a.codalumno','=','m.codalumno')
        ->join('seccion as s','m.codseccion','=','s.codseccion')
        ->join('grado as g','g.codgrado','=','s.codgrado')
        ->join('nivel as n','n.codnivel','=','g.codnivel')
        ->where('m.codmatricula','=',$id)
        ->select('m.codmatricula','m.nromatricula','m.escala','m.fecha','m.añoingreso','a.apellidopaterno','a.apellidomaterno','a.primernombre','a.otrosnombres','s.descripcion as seccion','g.descripcion as grado','n.descripcion as nivel')->first();

        return view('tablas/matricula.edit',compact('matricula','nivel'));
    }
    public function update(Request $request, $id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->codseccion=$request->Seccion2;
        $matricula->añoingreso=$request->añoingreso;
        $matricula->escala=$request->escala;
        $matricula->save(); 
        return redirect()->route('matricula.index')->with('datos','Registro Actualizado');
    }

    public function buscarAlumno($cod)
    {   
        return DB::table('alumno')
        ->where('codeducando','=',$cod)->select('apellidopaterno','apellidomaterno','primernombre','otrosnombres')->get(); 
    }
}
