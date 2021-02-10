<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table="provincia";
    protected $primaryKey="codprovincia";
    public $timestamps =false;
    protected $fillable = [
        'coddepartamento','descripcion',
    ];

    public function departamento()
    {
        return $this->hasOne('App\Departamento','coddepartamento','coddepartamento');
    }
}
