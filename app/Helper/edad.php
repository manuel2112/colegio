<?php 

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

function calcularEdad($fecha){
    return Carbon::parse($fecha)->age . ' años';
}