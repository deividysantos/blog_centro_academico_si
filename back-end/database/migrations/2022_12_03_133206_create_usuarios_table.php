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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('senha');
            $table->string('url_foto')->nullable();
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->char('inativo');
        });

        Artisan::call('db:seed', array('--class' => 'UsuariosSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
