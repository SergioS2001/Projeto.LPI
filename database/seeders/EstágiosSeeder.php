<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use App\Models\Cursos_Estágios;
use App\Models\Unidades_Curriculares;
use App\Models\Serviços;
use App\Models\Tipologia_Estágio;
use App\Models\Presenças;
use App\Models\Cacifos;
use App\Models\Avaliações;
use App\Models\Solicitação_Vagas;

class EstágiosSeeder extends Seeder
{
    public function run()
    {
        // Get some related data
        $instituicao_estagio = Instituição_Estágio::first();
        $curso_estagio = Cursos_Estágios::first();
        $unidade_curricular = Unidades_Curriculares::first();
        $serviço = Serviços::first();
        $tipologia_estagio = Tipologia_Estágio::first();
        //$solicitacao_vagas = Solicitação_Vagas::first();

        // Create some estagios
        Estágios::create([
            'nome' => 'Estágio 1',
            'isExterno' => false,
            'instituição_estagio_id' => $instituicao_estagio->id,
            'curso_estagio_id' => $curso_estagio->id,
            'unidade_curricular_id' => $unidade_curricular->id,
            'ano_curricular' => 2,
            'serviços_id' => $serviço->id,
            'tipologia_estagio_id' => $tipologia_estagio->id,
            'data_inicial' => '2022-01-01',
            'data_final' => '2022-06-30',
            //'solicitacao_vagas_id' => $solicitacao_vagas->id,
            'isAdmitido' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Estágios::create([
            'nome' => 'Estágio 2',
            'instituição_estagio_id' => 2,
            'curso_estagio_id' => 2,
            'unidade_curricular_id' => 2,
            'ano_curricular' => 3,
            'serviços_id' => 2,
            'tipologia_estagio_id' => 2,
            'data_inicial' => '2022-07-01',
            'data_final' => '2022-12-31',
            //'solicitacao_vagas_id' => 2,
            'isAdmitido' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}