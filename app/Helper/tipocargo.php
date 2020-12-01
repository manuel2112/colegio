<?php 

use Illuminate\Support\Facades\DB;

function nmbTipoCargo($id){
    $tipocargo = DB::table('tipocargo')->where('id', $id)->first();
    return $tipocargo->TIPO_CARGO_NOMBRE;
}