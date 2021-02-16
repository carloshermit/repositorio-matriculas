<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table="alumno_seccion";
    protected $primaryKey="codalumnoseccion";
    public $timestamps =false;
    protected $fillable = [
        'codseccion',"codeducando",
    ];

    public function alumno()
    {
        return $this->hasOne('App\Alumno','codeducando','codeducando');
    }
    public function seccion()
    {
        return $this->hasOne('App\Seccion','codseccion','codseccion');
    }
}
