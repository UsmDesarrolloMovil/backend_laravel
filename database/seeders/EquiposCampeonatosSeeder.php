<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquiposCampeonatosSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipos_campeonatos')->truncate();

        DB::table('equipos_campeonatos')->insert([
            [
                'campeonato_id' => 1,
                'equipo_id' => 3,
                'puntos' => 10,
            ],
            [
                'campeonato_id' => 1,
                'equipo_id' => 4,
                'puntos' => 8,
            ],
            [
                'campeonato_id' => 2,
                'equipo_id' => 1,
                'puntos' => 1,
            ],
            [
                'campeonato_id' => 1,
                'equipo_id' => 5,
                'puntos' => 0,
            ],

        ]);
    }
}
