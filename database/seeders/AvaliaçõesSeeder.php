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
            'nota' => 16.5,
            'isDone' => false,
            'fileSubmitted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Avaliações::create([
            'orientação_estagios_id' => 1,
            'nota' => 12.0,
            'isDone' => false,
            'fileSubmitted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}