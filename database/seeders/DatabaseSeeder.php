<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CampeonatoSeeder::class,
            EquipoSeeder::class,
            JugadorSeeder::class,
            PartidoSeeder::class,
            ResultadoSeeder::class,
            ReglaSeeder::class,
            EquiposCampeonatosSeeder::class,
        ]);
    }
}
