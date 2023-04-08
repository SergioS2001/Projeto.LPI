<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Curso_Estagio;

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
                'curso' => 'Computer Science',
            'ects' => 180,
            'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso' => 'Electrical Engineering',
            'ects' => 240,
            'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso' => 'Mechanical Engineering',
                'ects' => 240,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($cursoestagio as $cursoestagio) {
            Curso_Estagio::create($cursoestagio);
        }
    }
}