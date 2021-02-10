<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table="alumno";
    protected $primaryKey="codalumno";
    public $timestamps =false;
    protected $fillable = [
        'codeducando','codmodular','dni','apellidopaterno',
        'apellidomaterno','primernombre',
        'otrosnombres','sexo','fechanacimiento','coddistrito',
        'fechaingreso','escala',
        'codlengua','estadocivil','codreligion','fechabautizo',
        'parroquiabautizo','colegioprocedencia',
    ];
}
