<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        DB::table('equipos')->truncate();
        DB::table('equipos')->insert([
            [
                'nombre' => 'Team Liquid',
                'juegos' => 'League of Legends, Dota 2, CS:GO',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/6/6f/Team_Liquid_2023_darkmode.png/600px-Team_Liquid_2023_darkmode.png',
            ],
            [
                'nombre' => 'Fnatic',
                'juegos' => 'League of Legends, Dota 2, CS:GO',
                'imagen_url' =>'https://liquipedia.net/commons/images/thumb/f/f9/Fnatic_2020_allmode.png/600px-Fnatic_2020_allmode.png'
            ],
            [
                'nombre' => 'G2 Esports',
                'juegos' => 'League of Legends, Valorant, Rocket League',
                'imagen_url' => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Esports_organization_G2_Esports_logo.svg/800px-Esports_organization_G2_Esports_logo.svg.png',
            ],
            [
                'nombre' => 'Team SoloMid',
                'juegos' => 'League of Legends, Valorant, Super Smash Bros.',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/d/dd/TSM_2019_darkmode.png/600px-TSM_2019_darkmode.png',
            ],
            [
                'nombre' => 'Cloud9',
                'juegos' => 'League of Legends, Valorant, CS:GO',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/a/a2/Cloud9_2023_full_allmode.png/600px-Cloud9_2023_full_allmode.png',
            ],
            [
                'nombre' => 'Rogue',
                'juegos' => 'League of Legends, Valorant, FIFA',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/c/c3/Rogue_allmode_full.png/600px-Rogue_allmode_full.png',
            ],
            [
                'nombre' => 'Team Vitality',
                'juegos' => 'League of Legends, CS:GO, Rainbow Six Siege',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/9/96/Team_Vitality_2023_darkmode.png/600px-Team_Vitality_2023_darkmode.png',
            ],
            [
                'nombre' => 'Team Envy',
                'juegos' => 'Call of Duty, CS:GO, Rocket League',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/6/63/Team_Envy_2018_full_darkmode.png/600px-Team_Envy_2018_full_darkmode.png',
            ],
            [
                'nombre' => '100 Thieves',
                'juegos' => 'League of Legends, Valorant, Call of Duty',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/5/57/100_Thieves_full_darkmode.png/600px-100_Thieves_full_darkmode.png',
            ],
            [
                'nombre' => 'Evil Geniuses',
                'juegos' => 'League of Legends, Dota 2, CS:GO',
                'imagen_url' => 'https://liquipedia.net/commons/images/thumb/7/78/Evil_Geniuses_2020_full_darkmode.png/600px-Evil_Geniuses_2020_full_darkmode.png',
            ],
        ]);
    }
}
