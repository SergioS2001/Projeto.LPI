<?php

namespace Database\Seeders;

use App\Models\AvaliacaoModulos;
use Illuminate\Database\Seeder;
use App\Models\Avaliações;
use Illuminate\Support\Facades\DB;

class AvaliacaoModulosSeeder extends Seeder
{
    public function run()
    {
        AvaliacaoModulos::create([
            'avaliações_id' => 1,
            'modulos_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        AvaliacaoModulos::create([
            'avaliações_id' => 1,
            'modulos_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}