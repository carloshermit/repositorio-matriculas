<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Matricula;
use App\Seccion;
use App\Alumno;
use App\Grado;
use App\Familiar;
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
        /*$data=request()->validate([
           
            'codalumno'=>'required|max:14',
            'nromatricula'=>'required|digits:5',
            'escala'=>'required|max:1',
            'añoingreso'=>'required|digits:4',

        ],
        [
            'codalumno.required'=>'Ingrese codigo del alumno',
            'codalumno.max'=>'Maximo 14 caracteres para codigo del alumno',
            'nromatricula.required'=>'Ingrese Nro de matricula',
            'nromatricula.digits'=>'Nro de matricula debe tener 5 digitos',
            'escala.required'=>'Ingrese escala',
            'escala.max'=>'Maximo 1 caracter para escala',
            'añoingreso.required'=>'Ingrese año de ingreso',
            'añoingreso.max'=>'Maximo 4 caracteres para año de ingreso',
        ]);*/

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
        $alumno=DB::table('matricula as m')->join('alumno as a','a.codalumno','=','m.codalumno')
        ->where('m.codmatricula','=',$id)
        ->select('a.codalumno')->first();
        $matricula= DB::table('familiar as f')->join('alumno as a','a.codalumno','=','f.codalumno')
        ->join('matricula as m','m.codalumno','=','a.codalumno')
        ->where('m.codmatricula','=',$id)
        ->select('m.codmatricula','m.codalumno','f.apellidopaterno','f.apellidomaterno','f.nombreprimero','f.nombreotros','f.celular','f.dni','f.relacion')->get();
        return view('tablas/matricula.add',compact('matricula','alumno'));
    }

    public function createadd($id)
    {
        $matricula= DB::table('alumno as a')
        ->where('a.codalumno','=',$id)
        ->select('a.codalumno')->get();
        return view('tablas/matricula.createadd',compact('matricula'));
    }
    public function storeadd(Request $request)
    {   
        $familiar=new familiar();
        $familiar->apellidopaterno=$request->appaterno;
        $familiar->apellidomaterno=$request->apmaterno;
        $familiar->nombreprimero=$request->primernombre;
        $familiar->nombreotros=$request->otronombres;
        $familiar->celular=$request->Celular;
        $familiar->codalumno=$request->codalumno;
        $familiar->dni=$request->DNI;
        $familiar->relacion=$request->relacion;
        $familiar->estado=1;
        $familiar->save();
        $matricula= DB::table('matricula')
        ->where('codalumno','=',$request->codalumno)->first();
        return redirect()->route('matricula.add',$matricula->codmatricula)->with('datos','Registro Nuevo Guardado!!');
    }

    public function editadd($id)
    {   
        $familiar=Familiar::findOrFail($id);
        return view('tablas/matricula.editadd',compact('familiar'));
    }
    public function updateadd(Request $request, $id)
    {   
        $familiar=Familiar::findOrFail($id);
        $familiar->apellidopaterno=$request->appaterno;
        $familiar->apellidomaterno=$request->apmaterno;
        $familiar->nombreprimero=$request->primernombre;
        $familiar->nombreotros=$request->otronombres;
        $familiar->celular=$request->Celular;
        $familiar->dni=$request->DNI;
        $familiar->relacion=$request->relacion;
        $familiar->estado=1;
        $familiar->save();
        $matricula= DB::table('matricula')
        ->where('codalumno','=',$familiar->codalumno)->first();
        return redirect()->route('matricula.add',$matricula->codmatricula)->with('datos','Registro Actualizado!!');
    }

    public function confirmaradd($id)
    {
        $familiar=Familiar::findOrFail($id);
        return view('tablas/matricula.confirmaradd',compact('familiar'));
    }

    public function destroyadd($id)
    {
        $familiar=Familiar::findOrFail($id);
        DB::table('familiar')->where('codfamiliar', '=', $id)->delete();
        $familiar->save(); 
        $matricula= DB::table('matricula')
        ->where('codalumno','=',$familiar->codalumno)->first();
        return redirect()->route('matricula.add',$matricula->codmatricula)->with('datos','Registro Eliminado');
    }

    public function confirmar($id)
    {
        $matricula=Matricula::findOrFail($id);
        return view('tablas/matricula.confirmar',compact('matricula'));
    }
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        DB::table('matricula')->where('codmatricula', '=', $id)->delete();
        $matricula->save(); 
        return redirect()->route('matricula.index')->with('datos','Registro Eliminado');
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
