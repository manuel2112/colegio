<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoSangreUpdate implements Rule
{
    public function __construct($param)
    {
        $this->idTipoSangre = $param;
    }
    
    public function passes($attribute, $value)
    {
        $tiposangre = DB::table('tiposangre')
                                    ->where([
                                        ['TIPO_SANGRE_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idTipoSangre],
                                        ['TIPO_SANGRE_FLAG', TRUE]
                                    ])
                                    ->get();
        $bool = count($tiposangre) > 0 ? false : true;
        return $bool;
    }
    public function message()
    {
        return 'Este Tipo de sangre ya existe.';
    }
}
