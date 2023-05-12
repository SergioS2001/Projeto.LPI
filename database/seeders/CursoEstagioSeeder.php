<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Cursos_Estágios;

class CursoEstagioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursoestagio = [
            [
                'curso' => 'Fisioterapia',
            'ects' => 180,
            'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso' => 'Enfermagem',
            'ects' => 240,
            'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso' => 'Farmácia',
                'ects' => 240,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($cursoestagio as $cursoestagio) {
            Cursos_Estágios::create($cursoestagio);
        }
    }
}