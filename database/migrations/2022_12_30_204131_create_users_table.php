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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('usuario')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_agencia');
            $table->string('senha');
            $table->rememberToken();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->foreign('id_agencia')->references('id')->on('agencias');
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
        Schema::dropIfExists('users');
    }
};
