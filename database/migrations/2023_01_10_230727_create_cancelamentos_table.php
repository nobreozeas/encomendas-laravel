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
        Schema::create('cancelamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_encomenda');
            $table->unsignedBigInteger('id_usuario');
            $table->string('motivo');
            $table->foreign('id_encomenda')->references('id')->on('encomendas');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('cancelamentos');
    }
};
