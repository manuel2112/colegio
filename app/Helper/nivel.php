<?php 

use Illuminate\Support\Facades\DB;

function nmbNivel($id){
    $nivel = DB::table('niveles')->where('id', $id)->first();
    return $nivel->NIVEL_NOMBRE;
}