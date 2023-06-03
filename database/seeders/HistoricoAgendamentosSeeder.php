<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Histórico_Agendamentos;
use Illuminate\Support\Facades\DB;

class HistoricoAgendamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('historico_agendamentos')->insert([
            [
                'agendamentos_id' =>  1,
                'orientação_estagios_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'agendamentos_id' =>  2,
                'orientação_estagios_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}