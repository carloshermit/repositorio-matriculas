<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catedra extends Model
{
    protected $table="catedra";
    protected $primaryKey="codcatedra";
    public $timestamps =false;
    protected $fillable = [
        'codseccion','codcurso','codpersonal'
    ];
}
