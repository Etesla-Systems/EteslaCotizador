<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversores', function (Blueprint $table) {
            $table->id('idInversor');
            $table->uuid('id_producto')->unique();
            $table->string('vTipoInversor', 15);
            $table->float('fPotencia');
            $table->string('vRangPotenciaPermit',12);
            $table->smallInteger('siNumeroCanales');
            $table->smallInteger('siPanelSoportados');
            $table->float('fISC');
            $table->integer('iVMIN');
            $table->integer('iVMAX');
            $table->integer('iPMAX');
            $table->integer('iPMIN');
            $table->tinyInteger('bAccesorio');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_producto')->references('idProducto')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inversores');
    }
}
