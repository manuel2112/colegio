<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoApoderado extends Model
{
    protected $table = 'alumno_apoderado';
    protected $fillable = ['ID_ALUMNO','ID_APODERADO'];
}
