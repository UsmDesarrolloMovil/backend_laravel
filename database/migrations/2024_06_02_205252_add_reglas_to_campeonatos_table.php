<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReglasToCampeonatosTable extends Migration
{
    public function up()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->json('reglas')->nullable(); // Agregar el campo 'reglas' como un array de strings
        });

        Schema::dropIfExists('reglas'); // Eliminar la tabla 'reglas'
    }

    public function down()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->dropColumn('reglas');
        });

        // Aquí puedes recrear la tabla 'reglas' si lo deseas
    }
}
