<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteTipoApoderadoUpdate implements Rule
{
    public function __construct($param)
    {
        $this->idTipoApoderado = $param;
    }
    
    public function passes($attribute, $value)
    {
        $tipoapoderado = DB::table('tipoapoderado')
                                    ->where([
                                        ['TIPO_APODERADO_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idTipoApoderado],
                                        ['TIPO_APODERADO_FLAG', TRUE]
                                    ])
                                    ->get();
        $bool = count($tipoapoderado) > 0 ? false : true;
        return $bool;
    }
    public function message()
    {
        return 'Este Tipo de Apoderado ya existe.';
    }
}
