<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->uuid('idPersona')->primary();
            $table->string('vNombrePersona', 50);
            $table->string('vPrimerApellido', 50);
            $table->string('vSegundoApellido', 50)->nullable()->default(null);
            $table->string('vTelefono', 13);
            $table->string('vCelular', 13)->nullable()->default(null);
            $table->string('vEmail', 100)->nullable()->default(null);
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
        Schema::dropIfExists('personas');
    }
}
