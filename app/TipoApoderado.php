<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoApoderado extends Model
{
    protected $table = 'tipoapoderado';
    protected $fillable = ['TIPO_APODERADO_NOMBRE'];
}
