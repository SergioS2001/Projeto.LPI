<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Unidade_Curricular;

class UnidadeCurricularSeeder extends Seeder
{
    public function run()
    {
        $unidadesCurriculares = [
            [
                'nome' => 'Matemática',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Português',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Física',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Química',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Biologia',
                'created_at' => now(),
            'updated_at' => now(),
            ],
        ];

        foreach ($unidadesCurriculares as $unidadeCurricular) {
            Unidade_Curricular::create($unidadeCurricular);
        }
    }
}
