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
        Schema::create('remetentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('telefone');
            $table->string('tp_documento', 3);
            $table->string('documento');
            $table->foreign('id_cliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('remetentes');
    }
};
