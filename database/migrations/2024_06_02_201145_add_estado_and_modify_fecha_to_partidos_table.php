<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoAndModifyFechaToPartidosTable extends Migration
{
    public function up()
    {
        Schema::table('partidos', function (Blueprint $table) {
            $table->integer('estado')->default(0); // Agregar el campo 'estado' con valor por defecto de 0
            $table->dateTime('fecha')->change(); // Cambiar el tipo de dato del campo 'fecha' a dateTime
        });
    }

    public function down()
    {
        Schema::table('partidos', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->date('fecha')->change();
        });
    }
}
