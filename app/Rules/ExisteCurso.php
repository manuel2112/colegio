<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteCurso implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $curso = DB::table('cursos')
                                    ->where([
                                        ['CURSO_NOMBRE', $value],
                                        ['CURSO_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($curso) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este Curso ya existe.';
    }
}
