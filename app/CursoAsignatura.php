<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoAsignatura extends Model
{
    protected $table = 'curso_asignatura';
    protected $fillable = ['CURSO_ID','ASIGNATURA_ID'];
}
