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
            'data' => now()->subDays(3),
            'h_entrada' => 8.5,
            'h_saida' => 17.0,
            'horas_dia' => 8.5,
            'horas_mes' => 172.5,
            'h_pausa' => 1,
            'count_presenças' => 22,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Presenças::create([
            'data' => now()->subDays(2),
            'h_entrada' => 9.0,
            'h_saida' => 17.5,
            'horas_dia' => 8.5,
            'horas_mes' => 170.5,
            'h_pausa' => 0.5,
            'count_presenças' => 21,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Presenças::create([
            'data' => now()->subDays(1),
            'h_entrada' => 8.0,
            'h_saida' => 16.0,
            'horas_dia' => 8,
            'horas_mes' => 168.0,
            'h_pausa' => 1,
            'count_presenças' => 20,
            'isValidated'=> false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}