<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteAsignaturaNmb implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $asignatura = DB::table('asignaturas')
                                    ->where([
                                        ['ASIGNATURA_NOMBRE', $value],
                                        ['ASIGNATURA_FLAG', TRUE]
                                    ])
                                    ->get();
        $bool = count($asignatura) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este nombre de asignatura ya existe.';
    }
}
