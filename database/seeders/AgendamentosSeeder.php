<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Agendamentos;
use Illuminate\Support\Facades\DB;

class AgendamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('agendamentos')->insert([
            [
                'tipo_agendamento_id' => 1,
                'data' => '2023-04-01',
                'descrição' => 'Reunião de equipe',
                'duração' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_agendamento_id' => 2,
                'data' => '2023-04-05',
                'descrição' => 'Apresentação de projeto',
                'duração' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_agendamento_id' => 3,
                'data' => '2023-04-10',
                'descrição' => 'Treinamento de novos funcionários',
                'duração' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}