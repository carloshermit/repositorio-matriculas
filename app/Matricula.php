<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table="matricula";
    protected $primaryKey="codmatricula";
    public $timestamps =false;
    protected $fillable = [
        'nromatricula','codalumno','codseccion','fecha','escala','añoingreso'
    ];

    public function alumno()
    {
        return $this->hasOne('App\Alumno','codalumo','codalumo');
    }
    public function seccion()
    {
        return $this->hasOne('App\Seccion','codseccion','codseccion');
    }
}
