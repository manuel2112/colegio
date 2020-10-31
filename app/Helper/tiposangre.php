<?php 

use Illuminate\Support\Facades\DB;

function nmbTipoSangre($id){
    $tiposangre = DB::table('tiposangre')->where('id', $id)->first();
    return $tiposangre->TIPO_SANGRE_NOMBRE;
}