<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoCargoUpdate implements Rule
{
    public function __construct($param)
    {
        $this->idTipoSangre = $param;
    }
    
    public function passes($attribute, $value)
    {
        $tipo = DB::table('tipocargo')
                                    ->where([
                                        ['TIPO_CARGO_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idTipoSangre],
                                        ['TIPO_CARGO_FLAG', TRUE]
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
