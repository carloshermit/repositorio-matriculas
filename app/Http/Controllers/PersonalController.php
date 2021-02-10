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
        return view('tablas/personal.create');
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
            'nombres.required'=>'Ingrese nombres de personal',
            'nombres.max'=>'Maximo 60 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de personal',
            'direccion.max'=>'Maximo 60 caracteres para direccion',
            'dni.required'=>'Ingrese dni de personal',
            'dni.digits'=>'DNI debe tener 8 digitos',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del personal',
            'telefono'=>'Maximo 10 caracteres para telefono',
            //'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del personal',
            'nroseguro'=>'Maximo 10 caracteres para nro de seguro',
            //'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $personal=new Personal();
        $personal->apellidosnombres=$request->nombres;
        $personal->direccion=$request->direccion;
        $personal->dni=$request->dni;
        $personal->telefono=$request->telefono;
        $personal->nroseguro=$request->nroseguro;
        $personal->estadocivil=$request->Estadocivil;
        $personal->estado='1';
        $personal->save();
        return redirect()->route('personal.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
    public function edit($id)
    {
        $personal=Personal::findOrFail($id);
        return view('tablas/personal.edit',compact('personal'));
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
            'nombres.required'=>'Ingrese nombres de personal',
            'nombres.max'=>'Maximo 60 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de personal',
            'direccion.max'=>'Maximo 60 caracteres para direccion',
            'dni.required'=>'Ingrese dni de personal',
            'dni.max'=>'Maximo 8 caracteres o dni',
            //'dni.numeric'=>'Ingrese solo digitos',
            'telefono.required'=>'Ingrese telefono del personal',
            'telefono'=>'Maximo 10 caracteres para telefono',
            'telefono.numeric'=>'Ingrese solo digitos',
            'nroseguro.required'=>'Ingrese nro de seguro del personal',
            'nroseguro'=>'Maximo 10 caracteres para nro de seguro',
            'nroseguro.numeric'=>'Ingrese solo digitos',
        ]);
        $personal=Personal::findOrFail($id);
        $personal->apellidosnombres=$request->nombres;
        $personal->direccion=$request->direccion;
        $personal->dni=$request->dni;
        $personal->telefono=$request->telefono;
        $personal->nroseguro=$request->nroseguro;
        $personal->estadocivil=$request->estadocivil;
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
}
