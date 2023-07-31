<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('idDireccion');
            $table->uuid('id_cliente');
            $table->string('cCodigoPostal',5);
            $table->string('vCalle',100);
            $table->string('vMunicipio',60);
            $table->string('vCiudad',60);
            $table->string('vEstado', 60);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_cliente')->references('idCliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
