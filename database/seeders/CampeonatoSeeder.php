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
                'premios' => 'Reglas estándar de Esports',
                'detalles' => 'Detalles del campeonato',
            ],
            [
                'nombre' => 'Campeonato Mundial de Valorant',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => 'Reglas estándar de Esports',
                'detalles' => 'Detalles del campeonato',
            ],
            [
                'nombre' => 'Campeonato Mundial de Super Smash bros',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => 'Reglas estándar de Esports',
                'detalles' => 'Detalles del campeonato',
            ],
        ]);
       
    }
}

