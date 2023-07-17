<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Solicitação_Vagas;

class SolicitaçãoVagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solicitação_Vagas::create([
            'estágios_id' => '1',
            'designação' => 'Solicitação 1',
            'objetivos' => 'Objetivos Estágio 1',
            'ano_letivo' => '2023/2024',
            'vagas' => 20,
            'carga_horaria_total' => 200,
        ]);
        
        Solicitação_Vagas::create([
            'estágios_id' => '2',
            'designação' => 'Solicitação 2',
            'objetivos' => 'Objetivos Estágio 2',
            'ano_letivo' => '2023/2024',
            'vagas' => 30,
            'carga_horaria_total' => 300,
        ]);
        
    }
}