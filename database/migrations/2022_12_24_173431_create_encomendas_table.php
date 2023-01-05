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
            $table->string('descricao');
            $table->string('unidade');
            $table->string('quantidade');
            $table->string('observacao')->nullable();
            $table->decimal('valor', 10, 2);
            $table->enum('status', [1, 2, 3, 4, 5])->default(1)->comment('1 - Aberto, 2 - Em trânsito, 3 - Aguardando Retirada , 4 - Concluído, 5 - Cancelado');
            $table->unsignedBigInteger('id_remetente');
            $table->unsignedBigInteger('id_destinatario');
            $table->unsignedBigInteger('id_origem');
            $table->unsignedBigInteger('id_destino');
            $table->unsignedBigInteger('id_tp_pagamento');
            $table->unsignedBigInteger('id_tp_faturamento');
            $table->string('codigo_rastreio');
            $table->foreign('id_remetente')->references('id')->on('remetentes');
            $table->foreign('id_destinatario')->references('id')->on('destinatarios');
            $table->foreign('id_origem')->references('id')->on('municipios');
            $table->foreign('id_destino')->references('id')->on('municipios');
            $table->foreign('id_tp_pagamento')->references('id')->on('tp_pagamentos');
            $table->foreign('id_tp_faturamento')->references('id')->on('tp_faturamentos');
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
