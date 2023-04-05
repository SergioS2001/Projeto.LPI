<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Tipo_Agendamento;

class TipoAgendamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Agendamento::create([
            'nome_evento' => 'Reunião',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Tipo_Agendamento::create([
            'nome_evento' => 'Apresentação',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Tipo_Agendamento::create([
            'nome_evento' => 'Treinamento',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
