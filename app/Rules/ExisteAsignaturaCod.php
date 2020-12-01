<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteAsignaturaCod implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $asignatura = DB::table('asignaturas')
                                    ->where([
                                        ['ASIGNATURA_COD', $value],
                                        ['ASIGNATURA_FLAG', TRUE]
                                    ])
                                    ->get();
        $bool = count($asignatura) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este código de asignatura ya existe.';
    }
}
