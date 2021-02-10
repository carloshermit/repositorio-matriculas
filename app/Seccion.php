<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table="seccion";
    protected $primaryKey="codseccion";
    public $timestamps =false;
    protected $fillable = [
        'codgrado','descripcion',
    ];
    public function grado()
    {
        return $this->hasOne('App\Grado','codgrado','codgrado');
    }
}
