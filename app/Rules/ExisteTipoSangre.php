<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoSangre implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $tipo = DB::table('tiposangre')
                                    ->where([
                                        ['TIPO_SANGRE_NOMBRE', $value],
                                        ['TIPO_SANGRE_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($tipo) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este Tipo de sangre ya existe.';
    }
}
