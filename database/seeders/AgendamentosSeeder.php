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
                'nome' =>  'agendamento1',
                'tipo_agendamento_id' => 1,
                'data' => '2023-05-07',
                'hora' => '15.0',
                'descrição' => 'Reunião de equipe',
                'duração' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' =>  'agendamento2',
                'tipo_agendamento_id' => 2,
                'data' => '2023-05-08',
                'hora' => '16.0',
                'descrição' => 'Apresentação de projeto',
                'duração' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' =>  'agendamento3',
                'tipo_agendamento_id' => 3,
                'data' => '2023-05-20',
                'hora' => '17.0',
                'descrição' => 'Treinamento de novos funcionários',
                'duração' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}