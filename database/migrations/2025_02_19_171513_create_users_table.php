<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('identificador', 191)->unique();
            $table->string('password');
            $table->string('rol');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
