<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglas extends Migration
{
    public function up()
    {
        Schema::create('reglas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained()->onDelete('cascade');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reglas');
    }
}
