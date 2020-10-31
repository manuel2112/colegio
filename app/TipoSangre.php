<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    protected $table = 'tiposangre';
    protected $fillable = ['TIPO_SANGRE_NOMBRE'];
}
