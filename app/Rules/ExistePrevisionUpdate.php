<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistePrevisionUpdate implements Rule
{    
    public function __construct($param)
    {
        $this->idPrevision = $param;
    }
    
    public function passes($attribute, $value)
    {
        $prevision = DB::table('prevision')
                                    ->where([
                                        ['PREVISION_NOMBRE', '=', $value],
                                        ['id', '!=', $this->idPrevision],
                                        ['PREVISION_FLAG', TRUE]
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
