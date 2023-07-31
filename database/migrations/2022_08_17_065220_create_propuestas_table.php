<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->uuid('idPropuesta')->primary();
            $table->uuid('id_cliente');
            $table->uuid('id_user');
            $table->unsignedBigInteger('id_direccion');
            $table->tinyInteger('tPorcentajeDescuento');
            $table->tinyInteger('tPorcentajePropuesta');
            $table->float('fCostoSinIvaMxn');
            $table->float('fCostoConIvaMxn');
            $table->float('fCostoSinIvaUsd');
            $table->float('fCostoConIvaUsd');
            $table->timestamp('expired_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_cliente')->references('idCliente')->on('clientes');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_direccion')->references('idDireccion')->on('direcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propuestas');
    }
}
