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
                'users_id' => 1,
                'nome' =>  'agendamento1',
                'tipo_agendamento_id' => 1,
                'data' => '2023-04-01',
                'hora' => '15.0',
                'descrição' => 'Reunião de equipe',
                'duração' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 1,
                'nome' =>  'agendamento2',
                'tipo_agendamento_id' => 2,
                'data' => '2023-04-05',
                'hora' => '16.0',
                'descrição' => 'Apresentação de projeto',
                'duração' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 1,
                'nome' =>  'agendamento3',
                'tipo_agendamento_id' => 3,
                'data' => '2023-04-10',
                'hora' => '17.0',
                'descrição' => 'Treinamento de novos funcionários',
                'duração' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}