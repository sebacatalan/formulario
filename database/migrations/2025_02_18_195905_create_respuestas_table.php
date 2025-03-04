<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('hora');
            $table->string('fecha');
            $table->string('motivo_consulta');
            $table->string('motivo_viaje');
            $table->string('via_acceso');
            $table->string('pais');
            $table->string('comuna')->nullable();
            $table->string('transporte');
            $table->string('cantidad');
            $table->string('rango1'); //entre 0 y 12 años
            $table->string('rango2'); //entre 13 y 25 años
            $table->string('rango3'); //entre 26 y 40 años
            $table->string('rango4'); //entre 41 y 60 años
            $table->string('rango5'); //entre 61 y 80 años
            $table->string('rango6'); //más de 81 años
            
            $table->string('alojo');
            $table->string('descubrimiento');
            $table->timestamps(); // Esto añadirá automáticamente campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};