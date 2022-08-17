<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual', function (Blueprint $table) {
            $table->id('idIndividual');
            $table->uuid('id_propuesta')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_propuesta')->references('idPropuesta')->on('propuestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual');
    }
}
