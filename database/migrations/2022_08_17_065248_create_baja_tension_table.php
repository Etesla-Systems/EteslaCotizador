<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajaTensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_tension', function (Blueprint $table) {
            $table->id('idBajaTension');
            $table->uuid('id_propuesta')->unique();
            $table->unsignedBigInteger('id_tarifaActual');
            $table->unsignedBigInteger('id_tarifaNueva');
            $table->float('fConsumoPromedio');
            $table->float('fPotenciaInstalada');
            $table->float('fPromedioNuevoConsumoMes');
            $table->float('fPromedioNuevoConsumoBim');
            $table->float('fPromedioNuevoConsumoAnual');
            $table->string('cTipoCombinacion', 11);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_propuesta')->references('idPropuesta')->on('propuestas');
            $table->foreign('id_tarifaActual')->references('idTarifa')->on('tarifas');
            $table->foreign('id_tarifaNueva')->references('idTarifa')->on('tarifas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baja_tension');
    }
}
