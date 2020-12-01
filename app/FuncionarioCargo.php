<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionarioCargo extends Model
{
    protected $table = 'funcionario_cargo';
    protected $fillable = ['FUNCIONARIO_ID','CARGO_ID'];
}
