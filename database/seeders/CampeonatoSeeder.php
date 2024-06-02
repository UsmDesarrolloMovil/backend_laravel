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
                'imagen_url'=>'https://www.gamerfocus.co/wp-content/uploads/2013/12/league-of-legends-modo-showdown-riot-games-experimental-1.png'
            ],
            [
                'nombre' => 'Campeonato Mundial de Valorant',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => '50.000 pesos argentinos',
                'detalles' => 'Será en Paris, Francia, el dia 28/05/2024',
                'imagen_url'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Valorant_logo_-_pink_color_version.svg/800px-Valorant_logo_-_pink_color_version.svg.png'
            ],
            [
                'nombre' => 'Campeonato Mundial de Super Smash bros',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => 'Una casa',
                'detalles' => 'Será en Valparaiso, Chile, el dia 28/05/2024',
                'imagen_url'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Super_Smash_Bros._Ultimate_logo.svg/2560px-Super_Smash_Bros._Ultimate_logo.svg.png'

            ],
        ]);
       
    }
}

