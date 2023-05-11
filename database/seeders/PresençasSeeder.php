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
            'horas_dia' => 8.5,
            'horas_mes' => 0,
            'tempo_pausa' => 1,
            'total_horas' => 0,
            'count_presenças' => 0,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Presenças::create([
            'orientação_estagios_id' =>2,
            'data' => now()->subDays(2),
            'h_entrada' => 9.0,
            'h_saida' => 17.5,
            'horas_dia' => 8.5,
            'horas_mes' => 0,
            'tempo_pausa' => 0.5,
            'total_horas' => 0,
            'count_presenças' => 0,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Presenças::create([
            'users_id' =>1,
            'estágios_id' => 2,
            'data' => now()->subDays(1),
            'h_entrada' => 8.0,
            'h_saida' => 16.0,
            'horas_dia' => 8,
            'horas_mes' => 0,
            'tempo_pausa' => 1,
            'total_horas' => 0,
            'count_presenças' => 0,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}