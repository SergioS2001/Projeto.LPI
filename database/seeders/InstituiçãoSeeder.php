<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Instituição_Estágio;

class InstituiçãoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instituicoes = [
            [
                'nome' => 'UFP/Escola Superior de Saúde',
                'sigla' => 'UFP/ESS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Escola Superior de Enfermagem do Porto',
                'sigla' => 'ESEP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Escola Superior de Saúde do Politécnico do Porto',
                'sigla' => 'ESSPP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Escola Superior de Saúde do Politécnico de Leiria',
                'sigla' => 'ESPL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Escola de Medicina da Universidade do Minho',
                'sigla' => 'EMUM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Faculdade de Medicina da Universidade do Porto',
                'sigla' => 'FMUP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Faculdade de Medicina da Universidade de Lisboa',
                'sigla' => 'FMUL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Faculdade de Medicina da Universidade de Coimbra',
                'sigla' => 'FMUC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Colégio de Gaia',
                'sigla' => 'C.Gaia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Instituto do Emprego e Formação Profissional',
                'sigla' => 'IEFP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($instituicoes as $instituicao) {
            Instituição_Estágio::create($instituicao);
        }
    }
}