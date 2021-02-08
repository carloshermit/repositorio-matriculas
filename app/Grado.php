<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table="nivel";
    protected $primaryKey="codnivel";
    public $timestamps =false;
    protected $fillable = [
        'descripcion',
    ];

    public function nivel()
    {
        return $this->hasOne('App\Nivel','codnivel','codnivel');
    }
}
