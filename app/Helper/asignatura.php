<?php 

use Illuminate\Support\Facades\DB;

function nmbAsignatura($nombre){
    $asignatura = DB::table('asignaturas')->where('ASIGNATURA_NOMBRE', $nombre)->where('ASIGNATURA_FLAG', 1)->first();
    return $asignatura;
}
function codAsignatura($cod){
    $asignatura = DB::table('asignaturas')->where('ASIGNATURA_COD', $cod)->where('ASIGNATURA_FLAG', 1)->first();
    return $asignatura;
}
function nmbAsignaturaByID($id){
    $asignatura = DB::table('asignaturas')->where('id', $id)->first();
    return $asignatura;
}