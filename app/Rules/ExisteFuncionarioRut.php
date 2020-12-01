<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Freshwork\ChileanBundle\Rut;

class ExisteFuncionarioRut implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $rutFormat = Rut::parse($value)->normalize();
        $rutValido = Rut::parse($value)->format(Rut::FORMAT_COMPLETE);
        if( strlen($rutFormat) == 8 ){
            $rutValido = '0'.$rutValido;
        }
        $funcionario = DB::table('funcionarios')
                                    ->where([
                                        ['FUNCIONARIO_RUT', $rutValido],
                                        ['FUNCIONARIO_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($funcionario) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Este RUT ya existe.';
    }
}
