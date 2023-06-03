<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instituicao_Aluno;

class InstituicaoAlunoSeeder extends Seeder
{
    public function run()
    {
        Instituicao_Aluno::create([
            'nome' => 'Universidade Fernando Pessoa',
        ]);
    }
}