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
            'nota' => 16.5,
            'isDone' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Avaliações::create([
            'nota' => 12.0,
            'isDone' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Avaliações::create([
            'nota' => 18.5,
            'isDone' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}