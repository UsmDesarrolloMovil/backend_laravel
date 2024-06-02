<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        DB::table('partidos')->truncate();

        DB::table('partidos')->insert([
            [
                'campeonato_id' => 1,
                'equipo_local_id' => 3,
                'equipo_visitante_id' => 4,
                'fecha' => '2024-06-01',
                'lugar' => 'Estadio Principal',
                'estado' => 1,
                'hora' => '10:00:00'

            ],
            [
                'campeonato_id' => 2,
                'equipo_local_id' => 1,
                'equipo_visitante_id' => 2,
                'fecha' => '2024-06-01',
                'lugar' => 'Estadio Principal',
                'estado' => 1,
                'hora' => '15:00:00'
            ],
            [
                'campeonato_id' => 1,
                'equipo_local_id' => 4,
                'equipo_visitante_id' => 5,
                'fecha' => '2024-06-01',
                'lugar' => 'Estadio Principal',
                'estado' => 0,
                'hora' => '10:00:00'
            ],
        ]);
    }
}
