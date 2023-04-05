<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Instituicao_Estagio;

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
                'nome' => 'Instituicao 1',
                'sigla' => 'I1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Instituicao 2',
                'sigla' => 'I2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Instituicao 3',
                'sigla' => 'I3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more institutions here
        ];

        foreach ($instituicoes as $instituicao) {
            Instituicao_Estagio::create($instituicao);
        }
    }
}
