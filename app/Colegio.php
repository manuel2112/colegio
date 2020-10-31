<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table = 'colegio';
    protected $fillable = ['COLEGIO_NOMBRE','COLEGIO_DIRECCION','CIUDAD_ID','COLEGIO_LOGO','COLEGIO_FONO_FIJO','COLEGIO_FONO_CEL','COLEGIO_EMAIL'];
}
