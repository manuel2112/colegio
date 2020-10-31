<?php 

use Illuminate\Support\Facades\DB;

function nmbCiudad($id){
    $ciudad = DB::table('ciudad')->where('id', $id)->first();
    return $ciudad->CIUDAD_NOMBRE;
}