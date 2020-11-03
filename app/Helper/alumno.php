<?php 

use Illuminate\Support\Facades\DB;

function alumno($id){
    $alumno = DB::table('alumnos')->where('id', $id)->first();
    return $alumno;
}