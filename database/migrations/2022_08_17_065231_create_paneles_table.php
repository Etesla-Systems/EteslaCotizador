<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paneles', function (Blueprint $table) {
            $table->id('idPanel');
            $table->uuid('id_producto')->unique();
            $table->float('fPotencia');
            $table->float('fISC');
            $table->float('fVOC');
            $table->float('fVMP');
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
        Schema::dropIfExists('paneles');
    }
}
