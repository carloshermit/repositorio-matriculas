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
        return view('tablas/alumnos.create');
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nombres'=>'required|max:40',
            'direccion'=>'required|max:40',
            'dni'=>'required|digits:8',
            'telefono'=>'required|max:10',
            'nroseguro'=>'required|max:10',
        ],
        [
            'nombres.required'=>'Ingrese nombres de alumno',
            'nombres.max'=>'Maximo 60 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de alumno',
            'direccion.max'=>'Maximo 60 caracteres para direccion',
            'dni.required'=>'Ingrese dni de alumno',
            'dni.digits'=>'DNI debe tener 8 digitos',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del alumno',
            'telefono'=>'Maximo 10 caracteres para telefono',
            //'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del alumno',
            'nroseguro'=>'Maximo 10 caracteres para nro de seguro',
            //'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $alumno=new alumno();
        $alumno->apellidosnombres=$request->nombres;
        $alumno->direccion=$request->direccion;
        $alumno->dni=$request->dni;
        $alumno->telefono=$request->telefono;
        $alumno->nroseguro=$request->nroseguro;
        $alumno->estadocivil=$request->Estadocivil;
        $alumno->estado='1';
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
