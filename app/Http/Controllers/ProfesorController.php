<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use DB;
class ProfesorController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $buscarpor=$request->buscarpor;
        $profesor=DB::table('profesor')
        ->where('nombres','like','%'.$buscarpor.'%')
        ->select('codprofesor','codigo','apellidopaterno','apellidomaterno','nombres')->paginate($this::PAGINATION);
        return view('tablas/profesores/index',compact('profesor','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tablas/profesores.create');
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
            'nombres'=>'required|max:60',
            'direccion'=>'required|max:60',
            'ruc_dni'=>'required|max:10',
            'email'=>'required|max:60',
        ],
        [
            'nombres.required'=>'Ingrese nombres de profesor',
            'nombres.max'=>'Maximo 60 caracteres para nombres',
            'direccion.required'=>'Ingrese direccion de profesor',
            'direccion.max'=>'Maximo 60 caracteres para direccion',
            'ruc_dni.required'=>'Ingrese ruc o dni de profesor',
            'ruc_dni.max'=>'Maximo 10 caracteres para ruc o dni',
            'email.required'=>'Ingrese email de profesor',
            'email.max'=>'Maximo 60 caracteres para email',
        ]);
        $profesor=new profesor();
        $profesor->nombres=$request->nombres;
        $profesor->direccion=$request->direccion;
        $profesor->ruc_dni=$request->ruc_dni;
        $profesor->email=$request->email;
        $profesor->estado='1';
        $profesor->save();
        return redirect()->route('profesor.index')->with('datos','Registro Nuevo Guardado!!');
        
    }
}