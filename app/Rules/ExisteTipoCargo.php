<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoCargo implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $tipo = DB::table('tipocargo')
                                    ->where([
                                        ['TIPO_CARGO_NOMBRE', $value],
                                        ['TIPO_CARGO_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($tipo) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este Tipo de Cargo ya existe.';
    }
}
