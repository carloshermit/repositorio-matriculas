<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Alumno;
class AlumnoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $alumno=DB::table('alumno')
        ->where('apellidopaterno','ilike','%'.$buscarpor.'%')
        ->orderBy('codalumno', 'asc')
        ->select('codalumno','codeducando','codmodular','dni','apellidopaterno',
        'apellidomaterno','primernombre',
        'otrosnombres','sexo','fechanacimiento','coddistrito',
        'fechaingreso','escala',
        'codlengua','estadocivil','codreligion','fechabautizo',
        'parroquiabautizo','colegioprocedencia')->paginate($this::PAGINATION);
        return view('tablas/alumnos/index',compact('alumno','buscarpor'));
    }
    public function create()
    {
        $pais=DB::table('pais')->get();
        return view('tablas/alumnos.create',compact('pais'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'codeducando'=>'required|max:40',
            'codmodular'=>'required|max:40',
            'dni'=>'required|digits:8',
            'appaterno'=>'required|max:40',
            'apmaterno'=>'required|max:40',
            'primernombre'=>'required|max:40',
            'otronombres'=>'required|max:40',
            //'sexo'=>'required|max:40',
            //'fechanac'=>'required|max:40', 
        ],
        [
            'codeducando.required'=>'Ingrese nombres de alumno',
            'codeducando.max'=>'Maximo 60 caracteres para nombres',
            'codmodular.required'=>'Ingrese direccion de alumno',
            'codmodular.max'=>'Maximo 60 caracteres para direccion',
            'dni.required'=>'Ingrese dni de alumno',
            'dni.digits'=>'DNI debe tener 8 digitos',
            'appaterno.required'=>'Ingrese telefono del alumno',
            'appaterno'=>'Maximo 10 caracteres para telefono',
            'apmaterno.required'=>'Ingrese nro de seguro del alumno',
            'apmaterno'=>'Maximo 10 caracteres para nro de seguro',
        ]);
        $arr = explode('/', $request->fechanac);
        $nFecha = $arr[2].'-'.$arr[1].'-'.$arr[0];         
        $alumno=new alumno();
        $alumno->codeducando=$request->codeducando;
        $alumno->codmodular=$request->codmodular;
        $alumno->dni=$request->dni;
        $alumno->apellidopaterno=$request->appaterno;
        $alumno->apellidomaterno=$request->apmaterno;
        $alumno->primernombre=$request->primernombre;
        $alumno->otrosnombres=$request->otronombres;
        $alumno->sexo=$request->sexo;
        $alumno->fechanacimiento=$nFecha;
        $alumno->coddistrito=$request->Distrito;
        $alumno->fechaingreso=$request->añoingreso;
        $alumno->escala=$request->escala;
        $alumno->codlengua=$request->lenguamat;
        $alumno->estadocivil=$request->estadocivil;
        $alumno->codreligion=$request->codreligion;
        if($request->fechabautizo!=null)
        {
            $arr2 = explode('/', $request->fechabautizo);
            $nFechaB = $arr2[2].'-'.$arr2[1].'-'.$arr2[0];         
            $alumno->fechabautizo=$nFechaB;
        }
        else{
            $alumno->fechabautizo='1900-01-01';
        }
        $alumno->parroquiabautizo=$request->parroquiabautizo;
        $alumno->colegioprocedencia=$request->colegioprocedencia;
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function edit($id)
    {
        $alumno=Alumno::findOrFail($id);
        return view('tablas/alumnos.edit',compact('alumno'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombres'=>'required|max:40',
            'direccion'=>'required|max:40',
            'dni'=>'required|max:8|numeric',
            'telefono'=>'required|max:10|numeric',
            'nroseguro'=>'required|max:10|numeric',
        ],
        [
            'nombres.required'=>'Ingrese nombres de alumno',
            'nombres.max'=>'Maximo 60 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de alumno',
            'direccion.max'=>'Maximo 60 caracteres para direccion',
            'dni.required'=>'Ingrese dni de alumno',
            'dni.max'=>'Maximo 8 caracteres o dni',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del alumno',
            'telefono'=>'Maximo 10 caracteres para telefono',
            'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del alumno',
            'nroseguro'=>'Maximo 10 caracteres para nro de seguro',
            'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $alumno=Alumno::findOrFail($id);
        $alumno->apellidosnombres=$request->nombres;
        $alumno->direccion=$request->direccion;
        $alumno->dni=$request->dni;
        $alumno->telefono=$request->telefono;
        $alumno->nroseguro=$request->nroseguro;
        $alumno->estadocivil=$request->estadocivil;
        $alumno->save(); 
        return redirect()->route('alumno.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $alumno=Alumno::findOrFail($id);
        return view('tablas/alumno.confirmar',compact('alumno'));
    }
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        DB::table('alumno')->where('codalumno', '=', $id)->delete();
        $alumno->save(); 
        return redirect()->route('alumno.index')->with('datos','Registro Eliminado');
    }
}
