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
        return view('tablas/grados/index',compact('nivel'));
    }
    public function create()
    {
        $nivel=DB::table('nivel')->orderBy('codnivel', 'asc')->get();
        return view('tablas/grados.create',compact('nivel'));
    }
    public function store(Request $request)
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
    public function edit($id)
    {
        $seccion=Seccion::findOrFail($id);
        return view('tablas/grados.edit',compact('seccion'));
    }
    public function listarGrados($codNivel)
    {   
        return DB::table('grado')->orderBy('codgrado', 'asc')
        ->where('codnivel','=',$codNivel)->select('codgrado','descripcion')->get(); 
    }
    public function listarSecciones($codGrado)
    {   
        return DB::table('seccion')->orderBy('codseccion', 'asc')
        ->where('codgrado','=',$codGrado)->select('codseccion','descripcion')->get(); 
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombre'=>'required|max:30'
        ],
        [
            'nombre.required'=>'Ingrese nombres de la seccion',
            'nombre.max'=>'Ingrese un maximo de 30 caracteres'
        ]);
        $seccion=Seccion::findOrFail($id);
        $seccion->descripcion=$request->nombre;
        $seccion->save(); 
        return redirect()->route('seccion.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $seccion=Seccion::findOrFail($id);
        return view('tablas/grados.confirmar',compact('seccion'));
    }
    public function destroy($id)
    {
        $seccion=Seccion::findOrFail($id);
        DB::table('seccion')->where('codseccion', '=', $id)->delete();
        $seccion->save(); 
        return redirect()->route('seccion.index')->with('datos','Registro Eliminado');
    }
}
