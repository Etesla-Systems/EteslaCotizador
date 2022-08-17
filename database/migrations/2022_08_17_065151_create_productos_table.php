<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->uuid('idProducto')->primary();
            $table->string('vNombreMaterialFot',50);
            $table->string('vMarca', 50);
            $table->float('fPrecio');
            $table->string('vTipoMoneda',30);
            $table->tinyInteger('vGarantia');
            $table->string('vOrigen', 50);
            $table->string('imgRuta',150)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
