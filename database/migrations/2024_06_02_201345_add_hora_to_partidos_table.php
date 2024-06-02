<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHoraToPartidosTable extends Migration
{
    public function up()
    {
        Schema::table('partidos', function (Blueprint $table) {
            $table->time('hora')->nullable(); // Agregar el campo 'hora'
        });
    }

    public function down()
    {
        Schema::table('partidos', function (Blueprint $table) {
            $table->dropColumn('hora');
        });
    }
}
