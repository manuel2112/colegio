<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteNivelUpdate implements Rule
{
    public function __construct($param)
    {
        $this->idNivel = $param;
    }
    
    public function passes($attribute, $value)
    {
        $nivel = DB::table('niveles')
                                    ->where([
                                        ['NIVEL_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idNivel],
                                        ['NIVEL_FLAG', TRUE]
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
