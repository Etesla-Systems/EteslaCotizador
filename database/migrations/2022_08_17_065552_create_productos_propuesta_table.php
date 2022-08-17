<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosPropuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_propuesta', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_propuesta');
            $table->uuid('id_producto');
            $table->smallInteger('tiCantidad');
            $table->float('fCostoUnitario');
            $table->string('cTipoMoneda',20);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_propuesta')->references('idPropuesta')->on('propuestas');
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
        Schema::dropIfExists('productos_propuesta');
    }
}
