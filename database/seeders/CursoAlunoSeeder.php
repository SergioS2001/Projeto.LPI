<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Curso_Aluno;

class CursoAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursoaluno = [
            [
            'curso' => 'Engenharia Informática',
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

        foreach ($cursoaluno as $cursoaluno) {
            Curso_Aluno::create($cursoaluno);
        }
    }
}