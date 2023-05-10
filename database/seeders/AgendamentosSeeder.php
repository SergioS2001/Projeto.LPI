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
                'nome' =>  'Sessão de acolhimento',
                'tipo_agendamento_id' => 3,
                'data' => '2023-04-10',
                'hora' => '17.0',
                'descrição' => 'Sessão de acolhimento Estágios/EC',
                'duração' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 1,
                'nome' =>  'Reuniões de Avaliação',
                'tipo_agendamento_id' => 3,
                'data' => '2023-04-10',
                'hora' => '17.0',
                'descrição' => 'Reuniões de Avaliação com Orientadores',
                'duração' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 1,
                'nome' =>  'agendamento3',
                'tipo_agendamento_id' => 2,
                'data' => '2023-04-05',
                'hora' => '16.0',
                'descrição' => 'Apresentação de projeto',
                'duração' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}