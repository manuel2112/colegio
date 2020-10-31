<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoApoderado implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $tipo = DB::table('tipoapoderado')
                                    ->where([
                                        ['TIPO_APODERADO_NOMBRE', $value],
                                        ['TIPO_APODERADO_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($tipo) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este Tipo de Apoderado ya existe.';
    }
}
