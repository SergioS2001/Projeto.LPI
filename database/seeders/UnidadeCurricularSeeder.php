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
                'nome' => 'Bioquímica',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Nutrição',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Anatomia Humana',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Epidemiologia',
                'created_at' => now(),
            'updated_at' => now(),
            ],
            [
                'nome' => 'Farmacologia',
                'created_at' => now(),
            'updated_at' => now(),
            ],
        ];

        foreach ($unidadesCurriculares as $unidadeCurricular) {
            Unidade_Curricular::create($unidadeCurricular);
        }
    }
}