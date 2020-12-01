<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteNivel implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $nivel = DB::table('niveles')
                                    ->where([
                                        ['NIVEL_NOMBRE', $value],
                                        ['NIVEL_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($nivel) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este Nivel ya existe.';
    }
}
