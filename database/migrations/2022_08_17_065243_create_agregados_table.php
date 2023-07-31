<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agregados', function (Blueprint $table) {
            $table->id('idAgregados')->autoIncrement();
            $table->uuid('id_producto')->unique();
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
        Schema::dropIfExists('agregados');
    }
}
