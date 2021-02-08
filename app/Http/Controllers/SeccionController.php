<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeccionController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        /*$buscarpor=$request->buscarpor;
        $curso=DB::table('curso')
        ->orderBy('codcurso', 'asc')
        ->where('descripcion','like','%'.$buscarpor.'%')
        ->select('codcurso','descripcion')->paginate($this::PAGINATION);*/
        return view('tablas/grados/index',compact('curso','buscarpor'));
    }
}
