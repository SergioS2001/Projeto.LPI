<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Presenças;

class PresençasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presenças::create([
            'orientação_estagios_id' =>1,
            'data' => now()->subDays(3),
            'h_entrada' => 8.5,
            'h_saida' => 17.0,
            'tempo_pausa' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}