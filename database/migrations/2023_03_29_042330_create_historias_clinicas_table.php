<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinica', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('enfermedad_act');
            $table->string('diagnostico');
            $table->string('plan_terapeutico');

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->on('pacientes')->references('id');
            $table->unsignedBigInteger('antep_id');
            $table->foreign('antep_id')->on('antecedentes_pato')->references('id');
            $table->unsignedBigInteger('antenp_id');
            $table->foreign('antenp_id')->on('antecedentes_nopato')->references('id');
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
        Schema::dropIfExists('historias_clinicas');
    }
}
