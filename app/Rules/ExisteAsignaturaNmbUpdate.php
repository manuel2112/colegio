<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteAsignaturaNmbUpdate implements Rule
{
    public function __construct($param)
    {
        $this->idAsignatura = $param;
    }
    
    public function passes($attribute, $value)
    {
        $asignatura = DB::table('asignaturas')
                                    ->where([
                                        ['ASIGNATURA_NOMBRE', $value],
                                        ['ASIGNATURA_FLAG', TRUE],
                                        ['id', '!=', $this->idAsignatura]
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
