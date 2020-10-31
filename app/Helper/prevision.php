<?php 

use Illuminate\Support\Facades\DB;

function nmbPrevision($id){
    $prevision = DB::table('prevision')->where('id', $id)->first();
    return $prevision->PREVISION_NOMBRE;
}