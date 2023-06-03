<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Avaliações;
use Illuminate\Support\Facades\DB;

class AvaliaçõesSeeder extends Seeder
{
    public function run()
    {
        Avaliações::create([
            'orientação_estagios_id' => 1,
            'module_count' => 2,
            'nota_final' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Avaliações::create([
            'orientação_estagios_id' => 2,
            'module_count' => 2,
            'nota_final' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}