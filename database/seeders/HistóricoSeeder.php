<?php

namespace Database\Seeders;

use App\Models\Histórico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistóricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Histórico::create([
            'presenças_id' => 1,
            'agendamentos_id' => 1,
            'estágios_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Histórico::create([
            'presenças_id' => 2,
            'agendamentos_id' => 2,
            'estágios_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}