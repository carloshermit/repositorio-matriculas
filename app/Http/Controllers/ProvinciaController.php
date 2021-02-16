<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Departamento;
use DB;

class ProvinciaController extends Controller
{
    const PAGINATION=10;
    public function index(Request $request)
    {
        $pais=DB::table('pais')->orderBy('descripcion', 'asc')->get();
        return view('tablas/ubicacion/index',compact('pais'));
    }
    public function listarDepartamentos($codPais)
    {   
        return DB::table('departamento')->orderBy('descripcion', 'asc')
        ->where('codpais','=',$codPais)->select('coddepartamento','descripcion')->get(); 
    }
    public function listarProvincias($codDepartamento)
    {   
        return DB::table('provincia')->orderBy('descripcion', 'asc')
        ->where('coddepartamento','=',$codDepartamento)->select('codprovincia','descripcion')->get(); 
    }
    public function listarDistritos($cod)
    {   
        return DB::table('distrito')->orderBy('descripcion', 'asc')
        ->where('codprovincia','=',$cod)->select('coddistrito','descripcion')->get(); 
    }
}
