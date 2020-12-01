<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCargo extends Model
{
    protected $table = 'tipocargo';
    protected $fillable = ['TIPO_CARGO_NOMBRE'];
}
