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
                'nome' =>  'Sessão de acolhimento',
                'data' => '2023-11-30',
                'hora' => '17.0',
                'descrição' => 'Sessão de acolhimento Estágios/EC',
                'hora_fim' => '18.0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}