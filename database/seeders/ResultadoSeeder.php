<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultadoSeeder extends Seeder
{
    public function run()
    {
        DB::table('resultados')->truncate();

        DB::table('resultados')->insert([
            [
                'partido_id' => 1,
                'equipo_ganador_id' => 3,
                'puntos_local' => 3,
                'puntos_visitante' => 1,
            ],
            [
                'partido_id' => 2,
                'equipo_ganador_id' => 1,
                'puntos_local' => 0,
                'puntos_visitante' => 3,
            ],
        ]);
    }
}
