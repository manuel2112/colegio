<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistePrevision implements Rule
{
    public function __construct(){}
    
    public function passes($attribute, $value)
    {
        $prevision = DB::table('prevision')
                                    ->where([
                                        ['PREVISION_NOMBRE', $value],
                                        ['PREVISION_FLAG', TRUE],
                                    ])
                                    ->get();
        $bool = count($prevision) > 0 ? false : true;
        return $bool;
    }

    public function message()
    {
        return 'Esta Previsión ya existe.';
    }
}
