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
            $table->year('ano', 4);
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
            $table->foreignId('cargo_id')->references('id')->on('cargos');
        });

        Artisan::call('db:seed', array('--class' => 'EleicoesSeeder'));
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
