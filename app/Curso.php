<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table="curso";
    protected $primaryKey="codcurso";
    public $timestamps =false;
    protected $fillable = [
        'descripcion',
    ];
}
