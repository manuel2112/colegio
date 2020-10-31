<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('ALUMNO_ID');
            $table->char('ALUMNO_RUT', 16);
            $table->char('ALUMNO_NOMBRES', 128);
            $table->char('ALUMNO_AP_PATERNO', 32);
            $table->char('ALUMNO_AP_MATERNO', 32);
            $table->char('ALUMNO_EMAIL', 128);
            $table->date('ALUMNO_FEC_NAC');
            $table->string('ALUMNO_DOMICILIO');
            $table->foreignId('CIUDAD_ID');
            $table->char('ALUMNO_FONO_CEL', 16);
            $table->char('ALUMNO_FONO_FIJO', 16);
            $table->char('ALUMNO_SEXO', 1);
            $table->date('ALUMNO_INGRESO');
            $table->date('ALUMNO_RETIRO');
            $table->char('ALUMNO_PASSWORD', 128);
            $table->foreignId('PREVISION_ID');
            $table->foreignId('SANGRE_ID');
            $table->boolean('ALUMNO_FLAG');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
