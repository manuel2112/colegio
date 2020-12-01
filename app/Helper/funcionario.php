<?php 

use Illuminate\Support\Facades\DB;

function funcionario($id){
    $funcionario = DB::table('funcionarios')->where('id', $id)->first();
    return $funcionario;
}