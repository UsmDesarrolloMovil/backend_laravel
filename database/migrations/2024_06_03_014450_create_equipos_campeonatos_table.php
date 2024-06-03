<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposCampeonatos extends Migration
{
    public function up()
    {
        Schema::create('equipos_campeonatos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            $table->integer('puntos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos_campeonatos');
    }
}
