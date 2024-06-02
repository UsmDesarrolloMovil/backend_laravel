<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampeonatoSeeder extends Seeder
{
    public function run()
    {
        DB::table('campeonatos')->truncate();

        DB::table('campeonatos')->insert([
            [
                'nombre' => 'Campeonato Mundial de League of Legends',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => '100.000.000 Millones de dolares',
                'detalles' => 'Será en Japon, el dia 28/05/2024',
            ],
            [
                'nombre' => 'Campeonato Mundial de Valorant',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => '50.000 pesos argentinos',
                'detalles' => 'Será en Paris, Francia, el dia 28/05/2024',
            ],
            [
                'nombre' => 'Campeonato Mundial de Super Smash bros',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => 'Una casa',
                'detalles' => 'Será en Valparaiso, Chile, el dia 28/05/2024',
            ],
        ]);
       
    }
}

