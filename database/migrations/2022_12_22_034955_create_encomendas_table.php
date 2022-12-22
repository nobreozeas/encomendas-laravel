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
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_remetente');
            $table->unsignedBigInteger('id_origem');
            $table->unsignedBigInteger('id_destino');
            $table->unsignedBigInteger('id_destinatario');
            $table->string('descricao_encomenda');
            $table->enum('status', [1, 2, 3, 4])->comment('1 - Pendente, 2 - Em Trânsito, 3 - Entregue, 4 - Cancelado')->default(1);
            $table->integer('quantidade_encomenda');
            $table->text('observacao_encomenda')->nullable();
            $table->string('forma_pagamento');
            $table->string('valor_encomenda');
            $table->string('tp_faturamento');
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
        Schema::dropIfExists('encomendas');
    }
};
