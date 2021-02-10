<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table="departamento";
    protected $primaryKey="coddepartamento";
    public $timestamps =false;
    protected $fillable = [
        'codpais','descripcion',
    ];

    public function pais()
    {
        return $this->hasOne('App\Pais','codpais','codpais');
    }
}
