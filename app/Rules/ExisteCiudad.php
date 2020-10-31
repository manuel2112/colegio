<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExisteCiudad implements Rule
{
    public function __construct()
    {
        
    }
    
    public function passes($attribute, $value)
    {
        $ciudad = DB::table('ciudad')
                                    ->where([
                                        ['CIUDAD_NOMBRE', $value],
                                        ['CIUDAD_FLAG', TRUE],
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
