<?php

namespace Database\Seeders;

use App\Models\Cacifo_Estagio;
use Illuminate\Database\Seeder;
use App\Models\Cacifos;
use App\Models\Cauções;

class CacifosSeeder extends Seeder
{
    public function run()
    {
        // Create some sample cauções
        $caucoes = [
            ['valor' => 5.0, 'isPago' => true, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 5.0, 'isPago' => true, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 5.0, 'isPago' => false, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 5.0, 'isPago' => false, 'isDevolvido' => false, 'isAssinadoAluno' => false],
        ];

        foreach ($caucoes as $caucao) {
            Cauções::create($caucao);
        }

        // Use the cauções to create some sample cacifos
        $cacifos = [
            ['numero' => 10, 'chave_partilhada' => false,'created_at' => now(),'updated_at' => now()],
            ['numero' => 20, 'chave_partilhada' => false,'created_at' => now(),'updated_at' => now()],
            ['numero' => 30, 'chave_partilhada' => false,'created_at' => now(),'updated_at' => now()],
            ['numero' => 40, 'chave_partilhada' => false,'created_at' => now(),'updated_at' => now()],
        ];

        foreach ($cacifos as $cacifo) {
            Cacifos::create($cacifo);
        }

    }
}
