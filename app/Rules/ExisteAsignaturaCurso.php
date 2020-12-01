<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteAsignaturaCurso implements Rule
{
    public function __construct($param)
    {
        $this->idCurso = $param;
    }
    
    public function passes($attribute, $value)
    {
        $existe = DB::table('curso_asignatura')
                                    ->where([
                                        ['ASIGNATURA_ID', $value],
                                        ['CUR_ASIG_FLAG', TRUE],
                                        ['CURSO_ID', $this->idCurso]
                                    ])
                                    ->get();
        $bool = count($existe) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Esta asignatura ya está relacionada a este curso.';
    }
}
