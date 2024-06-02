<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReglaSeeder extends Seeder
{
    public function run()
    {
        DB::table('reglas')->truncate();

        DB::table('reglas')->insert([
            [
                'campeonato_id' => 1,
                'descripcion' => 'No se permiten hacks ni trampas',
            ],
            [
                'campeonato_id' => 2,
                'descripcion' => 'No se permiten hacks ni trampas',
            ],
        ]);
    }
}
