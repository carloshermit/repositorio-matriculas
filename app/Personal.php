<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table="personal";
    protected $primaryKey="codpersonal";
    public $timestamps =false;
    protected $fillable = [
        'coddepartamentoa','apellidosnombres','telefono','nroseguro'
        ,'direccion','dni','estadocivil','fechaingreso','estado',
    ];
}
