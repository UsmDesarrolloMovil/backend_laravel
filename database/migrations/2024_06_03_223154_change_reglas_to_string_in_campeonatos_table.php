<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReglasToStringInCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->text('reglas')->change(); // Cambia el tipo de columna a string (texto)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->json('reglas')->change(); // Revertir el cambio a tipo JSON en caso de rollback
        });
    }
}
