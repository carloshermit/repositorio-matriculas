<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table="familiar";
    protected $primaryKey="codfamiliar";
    public $timestamps =false;
    protected $fillable = [
        'apellidopaterno','apellidomaterno','nombreprimero','nombreotros', 'celular', 'codalumno', 'estado',
    ];

    public function alumno()
    {
        return $this->hasOne('App\Alumno','codalumno','codalumno');
    }
}
