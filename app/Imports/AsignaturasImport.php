<?php

namespace App\Imports;

use App\Asignatura;
use Maatwebsite\Excel\Concerns\ToModel;

class AsignaturasImport implements ToModel
{
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        if (!isset($row[1])) {
            return null;
        }
        if ( codAsignatura($row[0]) ) {
            return null;
        }
        if ( nmbAsignatura($row[1]) ) {
            return null;
        }

        return new Asignatura([
            'ASIGNATURA_COD'       => $row[0],
            'ASIGNATURA_NOMBRE'    => $row[1]
        ]);
    }
}
