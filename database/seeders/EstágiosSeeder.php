<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use App\Models\Curso_Estagio;
use App\Models\Unidade_Curricular;
use App\Models\Serviços;
use App\Models\Tipologia_Estágio;
use App\Models\Presenças;
use App\Models\Cacifos;
use App\Models\Avaliações;
use App\Models\Solicitação_Vagas;
use App\Models\Estado_Estagio;

class EstágiosSeeder extends Seeder
{
    public function run()
    {
        // Get some related data
        $instituicao_estagio = Instituição_Estágio::first();
        $curso_estagio = Curso_Estagio::first();
        $unidade_curricular = Unidade_Curricular::first();
        $serviço = Serviços::first();
        $tipologia_estagio = Tipologia_Estágio::first();
        $avaliação = Avaliações::first();
        $solicitacao_vagas = Solicitação_Vagas::first();
        $estado_estagio = Estado_Estagio::first();

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
            'avaliacao_id' => $avaliação->id,
            'solicitacao_vagas_id' => $solicitacao_vagas->id,
            'estado_estagio_id' => $estado_estagio->id,
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
            'avaliacao_id' => 2,
            'solicitacao_vagas_id' => $solicitacao_vagas->id,
            'estado_estagio_id' => $estado_estagio->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}