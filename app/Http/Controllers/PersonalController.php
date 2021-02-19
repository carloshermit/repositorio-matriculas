<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Personal;
class PersonalController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $personal=DB::table('personal')
        ->where('apellidosnombres','ilike','%'.$buscarpor.'%')
        ->orderBy('codpersonal', 'asc')
        ->select('codpersonal','apellidosnombres','telefono'
        ,'nroseguro','direccion','dni','estadocivil','fechaingreso')->paginate($this::PAGINATION);
        return view('tablas/personal/index',compact('personal','buscarpor'));
    }

    public function create()
    {
        $nivel=DB::table('nivel')->get();
        return view('tablas/personal.create',compact('nivel'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nombres'=>'required|max:40',
            'direccion'=>'required|max:40',
            'dni'=>'required|digits:8',
            'telefono'=>'required|max:9',
            'nroseguro'=>'required|max:11',
        ],
        [
            'nombres.required'=>'Ingrese nombres de personal',
            'nombres.max'=>'Maximo 40 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de personal',
            'direccion.max'=>'Maximo 40 caracteres para direccion',
            'dni.required'=>'Ingrese DNI de personal',
            'dni.digits'=>'DNI debe tener 8 digitos',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del personal',
            'telefono'=>'Maximo 9 caracteres para telefono',
            //'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del personal',
            'nroseguro'=>'Maximo 11 caracteres para nro de seguro',
            //'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $personal=new Personal();
        $personal->apellidosnombres=$request->nombres;
        $personal->direccion=$request->direccion;
        $personal->dni=$request->dni;
        $personal->telefono=$request->telefono;
        $personal->nroseguro=$request->nroseguro;
        $personal->estadocivil=$request->Estadocivil;
        $personal->coddepartamentoa=$request->departamento;
        $arr = explode('/', $request->añoingreso);
        $nFecha = $arr[2].'-'.$arr[1].'-'.$arr[0];         
        $personal->fechaingreso=$nFecha;
        $personal->estado='1';
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function edit($id)
    {
        $nivel=DB::table('nivel')->get();
        $personal=Personal::findOrFail($id);
        return view('tablas/personal.edit',compact('personal','nivel'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombres'=>'required|max:40',
            'direccion'=>'required|max:40',
            'dni'=>'required|digits:8',
            'telefono'=>'required|max:10',
            'nroseguro'=>'required|max:10',
        ],
        [
            'nombres.required'=>'Ingrese nombres de personal',
            'nombres.max'=>'Maximo 40 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de personal',
            'direccion.max'=>'Maximo 40 caracteres para direccion',
            'dni.required'=>'Ingrese DNI de personal',
            'dni.digits'=>'DNI debe tener 8 digitos',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del personal',
            'telefono'=>'Maximo 9 caracteres para telefono',
            //'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del personal',
            'nroseguro'=>'Maximo 11 caracteres para nro de seguro',
            //'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $personal=Personal::findOrFail($id);
        $personal->apellidosnombres=$request->nombres;
        $personal->direccion=$request->direccion;
        $personal->dni=$request->dni;
        $personal->telefono=$request->telefono;
        $personal->nroseguro=$request->nroseguro;
        $personal->estadocivil=$request->estadocivil;
        $personal->coddepartamentoa=$request->departamento;
        $arr = explode('/', $request->añoingreso);
        $nFecha = $arr[2].'-'.$arr[1].'-'.$arr[0];            
        $personal->fechaingreso=$nFecha;
        $personal->save(); 
        return redirect()->route('personal.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $personal=Personal::findOrFail($id);
        return view('tablas/personal.confirmar',compact('personal'));
    }
    public function destroy($id)
    {
        $personal=Personal::findOrFail($id);
        DB::table('personal')->where('codpersonal', '=', $id)->delete();
        $personal->save(); 
        return redirect()->route('personal.index')->with('datos','Registro Eliminado');
    }
    public function add($id)
    {
        $personal=DB::table('personal')
        ->where('codpersonal','=',$id)
        ->select('codpersonal')->first();
        $catedra= DB::table('personal as p')->join('catedra as c','p.codpersonal','=','c.codpersonal')
        ->join('seccion as s','s.codseccion','=','c.codseccion')
        ->join('grado as g','s.codgrado','=','g.codgrado')
        ->join('nivel as n','n.codnivel','=','g.codnivel')
        ->join('curso_grado as cg','cg.codcursogrado','=','c.codcursogrado')
        ->join('curso as cu','cu.codcurso','=','cg.codcurso')
        ->where('p.codpersonal','=',$id)
        ->select('cu.descripcion as curso','g.descripcion as grado','s.descripcion as seccion','n.descripcion as nivel')->get();
        return view('tablas/personal.add',compact('personal','catedra'));
    }
    public function createadd($id)
    {
        $personal=DB::table('personal')
        ->where('codpersonal','=',$id)
        ->select('codpersonal')->first();
        return view('tablas/personal.createadd',compact('personal'));
    }
}
