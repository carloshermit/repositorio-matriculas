<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table="profesor";
    protected $primaryKey="codProfesor";
    public $timestamps =false;
    protected $fillable = [
        'codigo', 'apellidoPaterno','apellidoMaterno','nombres',
    ];
}
