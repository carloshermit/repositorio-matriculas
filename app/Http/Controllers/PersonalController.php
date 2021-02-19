<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Personal;
use App\Catedra;
class PersonalController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $personal=DB::table('personal')
        ->join('nivel as n','n.codnivel','=','coddepartamentoa')
        ->where('apellidosnombres','ilike','%'.$buscarpor.'%')
        ->orderBy('codpersonal', 'asc')
        ->select('codpersonal','apellidosnombres','telefono','n.descripcion as nivel'
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
        $personal->fechaingreso=$request->añoingreso;
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
        ->where('codpersonal','=',$id)->first();
        $catedra= DB::table('catedra as ca')
        ->join('seccion as s','s.codseccion','=','ca.codseccion')
        ->join('grado as g','s.codgrado','=','g.codgrado')
        ->join('nivel as n','n.codnivel','=','g.codnivel')
        ->join('curso as cu','cu.codcurso','=','ca.codcurso')
        ->where('ca.codpersonal','=',$id)
        ->select('ca.codcatedra','cu.codcurso','cu.descripcion as curso',
        'g.codgrado','g.descripcion as grado',
        's.codseccion','s.descripcion as seccion',
        'n.codnivel','n.descripcion as nivel')->get();
        return view('tablas/personal.add',compact('catedra','personal'));
    }
    public function createadd($id)
    {
        $curso=DB::table('curso')->get();
        $grado=DB::table('grado as g') 
        ->join('personal as p','p.coddepartamentoa','=','g.codnivel')
        ->where('p.codpersonal','=',$id)
        ->select('g.codgrado','g.descripcion')
        ->get();
        $personal= DB::table('personal')
        ->where('codpersonal','=',$id)->first();
        return view('tablas/personal.createadd',compact('curso','grado','personal'));
    }

    public function storeadd(Request $request)
    {   
        $catedra=new Catedra();
        $catedra->codseccion=$request->Seccion2;
        $catedra->codcurso=$request->Curso;
        $catedra->codpersonal=$request->codpersonal;
        $catedra->save();
        $personal= DB::table('personal')
        ->where('codpersonal','=',$request->codpersonal)->first();
        return redirect()->route('personal.add',$personal->codpersonal)->with('datos','Registro Nuevo Guardado!!');
    }
    public function editadd($id)
    {   
        $catedra=Catedra::findOrFail($id);
        $curso=DB::table('curso')->get();
        $personal=DB::table('personal as p')
        ->join('catedra as c','c.codpersonal','=','p.codpersonal')
        ->where('c.codcatedra','=',$id)
        ->select('p.codpersonal')
        ->first();
        $grado=DB::table('grado as g')
        ->join('nivel as n','n.codnivel','=','g.codnivel')
        ->join('personal as p','p.coddepartamentoa','=','n.codnivel')
        ->where('p.codpersonal','=',$personal->codpersonal)
        ->select('g.codgrado','g.descripcion')
        ->get();
        return view('tablas/personal.editadd',compact('catedra','curso','grado','personal'));
    }
    public function updateadd(Request $request, $id)
    {   
        $catedra=Catedra::findOrFail($id);
        $catedra->codseccion=$request->Seccion2;
        $catedra->codcurso=$request->Curso;
        $catedra->codpersonal=$request->codpersonal;
        $catedra->save();
        $personal= DB::table('personal')
        ->where('codpersonal','=',$catedra->codpersonal)->first();
        return redirect()->route('personal.add',$personal->codpersonal)->with('datos','Registro Actualizado!!');
    }
    public function confirmaradd($id)
    {
        $catedra=Catedra::findOrFail($id);
        return view('tablas/personal.confirmaradd',compact('catedra'));
    }

    public function destroyadd($id)
    {
        $catedra=Catedra::findOrFail($id);
        DB::table('catedra')->where('codcatedra', '=', $id)->delete();
        $catedra->save(); 
        $personal= DB::table('personal')
        ->where('codpersonal','=',$catedra->codpersonal)->first();
        return redirect()->route('personal.add',$personal->codpersonal)->with('datos','Registro Eliminado');
    }
}
