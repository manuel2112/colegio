<?php 

use Illuminate\Support\Facades\DB;

function logoColegio(){
    $colegio = DB::table('colegio')->where('id', 1)->first();
    if( !empty($colegio->COLEGIO_LOGO) ){
        $var = '<img src="'.Storage::url($colegio->COLEGIO_LOGO).'" width="50" class="img-responsive" alt="'.$colegio->COLEGIO_NOMBRE.'">';
        
    }else{
        $var = '<img src="'.Storage::url('default.png').'" width="150" class="img-responsive" alt="COLEGIO">';
    }
    return $var;
}