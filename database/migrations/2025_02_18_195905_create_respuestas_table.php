<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('motivo_consulta')->nullable();
            $table->string('motivo_consulta_especifico')->nullable();
            $table->string('motivo_viaje')->nullable();
            $table->string('via_acceso')->nullable();
            $table->string('pais_residencia')->nullable();
            $table->string('comuna_residencia')->nullable();
            $table->string('tipo_transporte')->nullable();
            $table->integer('cantidad_viajeros')->nullable();
            $table->integer('edad_0_12')->nullable();
            $table->integer('edad_13_25')->nullable();
            $table->integer('edad_26_40')->nullable();
            $table->integer('edad_41_60')->nullable();
            $table->integer('edad_61_80')->nullable();
            $table->integer('edad_mas_81')->nullable();
            $table->integer('visitas_comuna')->nullable();
            $table->string('volver_visitar')->nullable();
            $table->string('tipo_alojamiento')->nullable();
            $table->integer('noches_alojamiento')->nullable();
            $table->string('presupuesto_viaje')->nullable();
            $table->string('actividades_turisticas_op1')->nullable();
            $table->string('actividades_turisticas_op2')->nullable();
            $table->string('atractivos_turisticos_op1')->nullable();
            $table->string('atractivos_turisticos_op2')->nullable();
            $table->integer('ecologia_panguipulli')->nullable();
            $table->string('problemas_estadia_op1')->nullable();
            $table->string('problemas_estadia_op2')->nullable();
            $table->string('medio_informacion')->nullable();
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
        Schema::dropIfExists('respuestas');
    }
}