<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistePupilo implements Rule
{
    public function __construct($param)
    {
        $this->idApoderado = $param;
    }
    
    public function passes($attribute, $value)
    {
        $ciudad = DB::table('alumno_apoderado')
                                    ->where([
                                        ['ID_ALUMNO', '=', $value],
                                        ['ID_APODERADO', '=', $this->idApoderado]
                                    ])
                                    ->get();
        $bool = count($ciudad) > 0 ? false : true;
        return $bool;
    }
    public function message()
    {
        return 'Esta relación ya ha sido ingresado.';
    }
}
