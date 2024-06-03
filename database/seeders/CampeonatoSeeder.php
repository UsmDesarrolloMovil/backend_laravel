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
                'nombre' => 'League of Legends Championship',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => '100.000.000 Millones de dolares',
                'detalles' => 'Será en Japon, el dia 28/05/2024',
                'imagen_url' => 'https://img.redbull.com/images/c_fill,w_1200,h_600,g_auto,f_auto,q_auto/redbullcom/2022/8/1/ksfga6rlx2ugfhjd9vnk/league-of-legends',
                'reglas' => json_encode([
                    'No se permite el uso de scripts o hacks.',
                    'Los jugadores deben respetar el código de conducta establecido por el organizador.',
                    'Cada equipo debe estar compuesto por cinco jugadores.',
                    'Se jugará en modo de torneo de eliminación simple.',
                ]),
            ],
            [
                'nombre' => 'Campeonato Mundial de Valorant',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => '50.000 pesos argentinos',
                'detalles' => 'Será en Paris, Francia, el dia 28/05/2024',
                'imagen_url' => 'https://images.contentstack.io/v3/assets/bltb6530b271fddd0b1/bltc04e4637524166dc/621853fd6be1e66143a66db2/022822_TakeoverCap_Banner.jpg',
                'reglas' => json_encode([
                    'El juego se disputará en partidas al mejor de tres.',
                    'Se permiten pausas técnicas de hasta 5 minutos por equipo.',
                    'Cada equipo debe tener un capitán designado.',
                    'Los jugadores deben respetar el código de ética y fair play.',
                ]),
            ],
            [
                'nombre' => 'Super Smash Bros Championship',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2024-06-15',
                'premios' => 'Una casa',
                'detalles' => 'Será en Valparaiso, Chile, el dia 28/05/2024',
                'imagen_url' => 'https://assets.nintendo.com/image/upload/f_auto/q_auto/dpr_1.5/ncom/software/switch/70010000012332/ac4d1fc9824876ce756406f0525d50c57ded4b2a666f6dfe40a6ac5c3563fad9',
                'reglas' => json_encode([
                    'Cada partida será una batalla al mejor de cinco.',
                    'Se permiten personajes y escenarios de cualquier versión del juego.',
                    'Se permiten las técnicas de edge guarding y edge hogging.',
                    'Los jugadores deben realizar el saludo inicial antes de comenzar la partida.',
                ])]
        ]);
       
    }
}

