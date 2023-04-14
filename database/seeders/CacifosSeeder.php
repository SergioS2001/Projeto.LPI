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
            ['valor' => 100.0, 'isPago' => true, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 150.0, 'isPago' => true, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 200.0, 'isPago' => false, 'isDevolvido' => false, 'isAssinadoAluno' => false],
            ['valor' => 250.0, 'isPago' => false, 'isDevolvido' => false, 'isAssinadoAluno' => false],
        ];

        foreach ($caucoes as $caucao) {
            Cauções::create($caucao);
        }

        // Use the cauções to create some sample cacifos
        $cacifos = [
            ['numero' => 1, 'chave_partilhada' => false, 'cauções_id' => 1,'created_at' => now(),'updated_at' => now()],
            ['numero' => 2, 'chave_partilhada' => false, 'cauções_id' => 2,'created_at' => now(),'updated_at' => now()],
            ['numero' => 3, 'chave_partilhada' => false, 'cauções_id' => 3,'created_at' => now(),'updated_at' => now()],
            ['numero' => 4, 'chave_partilhada' => false, 'cauções_id' => 4,'created_at' => now(),'updated_at' => now()],
        ];

        foreach ($cacifos as $cacifo) {
            Cacifos::create($cacifo);
        }

    }
}
