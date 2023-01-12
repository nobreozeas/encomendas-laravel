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
        Schema::table('encomendas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_agencia')->nullable();
            $table->foreign('id_agencia')->references('id')->on('agencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encomendas', function (Blueprint $table) {
            $table->dropForeign(['id_agencia']);
            $table->dropColumn('id_agencia');
        });
    }
};
