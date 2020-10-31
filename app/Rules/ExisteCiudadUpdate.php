<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteCiudadUpdate implements Rule
{    
    public function __construct($param)
    {
        $this->idCiudad = $param;
    }
    
    public function passes($attribute, $value)
    {
        $ciudad = DB::table('ciudad')
                                    ->where([
                                        ['CIUDAD_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idCiudad],
                                        ['CIUDAD_FLAG', TRUE]
                                    ])
                                    ->get();
        $bool = count($ciudad) > 0 ? false : true;
        return $bool;
    }
    public function message()
    {
        return 'Esta Ciudad ya existe.';
    }
}
