<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use DB;
class CursoController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $curso=DB::table('curso')
        ->where('descripcion','ilike','%'.$buscarpor.'%')
        ->orderBy('codcurso', 'asc')
        ->select('codcurso','descripcion')->paginate($this::PAGINATION);
        return view('tablas/cursos/index',compact('curso','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas/cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=>'required|max:60',
        ],
        [
            'nombre.required'=>'Ingrese nombres de curso',
            'nombre.max'=>'Maximo 60 caracteres para nombres',
        ]);
        $curso=new Curso();
        $curso->descripcion=$request->nombre;
        $curso->save();
        return redirect()->route('curso.index')->with('datos','Registro Nuevo Guardado!!');   
    }
    public function edit($id)
    {
        $curso=Curso::findOrFail($id);
        return view('tablas/cursos.edit',compact('curso'));
    }
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombre'=>'required|max:30'
        ],
        [
            'nombre.required'=>'Ingrese nombres de curso',
            'nombre.max'=>'Ingrese un maximo de 30 caracteres'
        ]);
        $curso=Curso::findOrFail($id);
        $curso->descripcion=$request->nombre;
        $curso->save(); 
        return redirect()->route('curso.index')->with('datos','Registro Actualizado');
    }
    public function confirmar($id)
    {
        $curso=curso::findOrFail($id);
        return view('tablas/cursos.confirmar',compact('curso'));
    }
    public function destroy($id)
    {
        $curso=curso::findOrFail($id);
        DB::table('curso')->where('codcurso', '=', $id)->delete();
        $curso->save(); 
        return redirect()->route('curso.index')->with('datos','Registro Eliminado');
    }
}
