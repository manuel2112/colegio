<?php 

use Illuminate\Support\Facades\DB;

function nmbTipoApoderado($id){
    $tipoapoderado = DB::table('tipoapoderado')->where('id', $id)->first();
    return $tipoapoderado->TIPO_APODERADO_NOMBRE;
}