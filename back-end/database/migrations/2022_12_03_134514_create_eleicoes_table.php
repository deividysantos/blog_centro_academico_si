<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleicoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_semestre')->references('id')->on('semestres');
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->foreignId('id_cargo')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleicoes');
    }
};
