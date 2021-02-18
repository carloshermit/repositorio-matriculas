<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Matricula;
use App\Seccion;
use App\Alumno;
use App\Familiar;
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
    public function add($id)
    {
        $matricula= DB::table('familiar as f')->join('alumno as a','a.codalumno','=','f.codalumno')
        ->join('matricula as m','m.codalumno','=','a.codalumno')
        ->where('m.codmatricula','=',$id)
        ->select('m.codmatricula','m.codalumno','f.apellidopaterno','f.apellidomaterno','f.nombreprimero','f.nombreotros','f.celular')->get();
        return view('tablas/matricula.add',compact('matricula'));
    }
    public function createadd($id)
    {
        $matricula= DB::table('familiar as f')->join('alumno as a','a.codalumno','=','f.codalumno')
        ->join('matricula as m','m.codalumno','=','a.codalumno')
        ->where('m.codmatricula','=',$id)
        ->select('m.codmatricula','m.codalumno','f.apellidopaterno','f.apellidomaterno','f.nombreprimero','f.nombreotros','f.celular')->get();
        return view('tablas/matricula.createadd',compact('matricula'));
    }
    public function storeadd(Request $request)
    {   
        $data=request()->validate([
            'nombre'=>'required|max:40',
        ],
        [
            'nombre.required'=>'Ingrese nombres de seccion',
            'nombre.max'=>'Maximo 60 caracteres para nombres',
        ]);
        $seccion=new Seccion();
        $seccion->codgrado=$request->Grado;
        $seccion->descripcion=$request->nombre;
        $seccion->save();
        return redirect()->route('seccion.index')->with('datos','Registro Nuevo Guardado!!');
    }
}
