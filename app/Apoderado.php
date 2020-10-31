<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table = 'apoderado';
    protected $fillable = ['APODERADO_RUT','APODERADO_NOMBRES','APODERADO_AP_PATERNO','APODERADO_AP_MATERNO','TIPO_APODERADO_ID','APODERADO_DOMICILIO','CIUDAD_ID','APODERADO_FONO_CEL','APODERADO_FONO_FIJO','APODERADO_TRABAJO','APODERADO_FONO_TRABAJO','APODERADO_EX_ALUMNO','APODERADO_IMG','APODERADO_FEC_NAC','APODERADO_EMAIL'];
}
