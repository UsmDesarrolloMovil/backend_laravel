<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JugadorSeeder extends Seeder
{
    public function run()
    {
        DB::table('jugadores')->truncate();

        DB::table('jugadores')->insert([
            [
                'nombre' => 'Faker',
                'equipo_id' => 1,
            ],
            [
                'nombre' => 'Mangini',
                'equipo_id' => 4,
            ],
            [
                'nombre' => 'Perkz',
                'equipo_id' => 2,
            ],
            [
                'nombre' => 'Camilo rankiao',
                'equipo_id' => 1,
            ],
            [
                'nombre' => 'S1mple',
                'equipo_id' => 4,
            ],
            [
                'nombre' => 'D1iego',
                'equipo_id' => 3,
            ],
        ]);
    }
}
