<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Aluno extends Model
{
    protected $table = 'curso_aluno';
    use HasFactory;

    public function instituicao_alunos()
{
    return $this->hasMany(Instituicao_Aluno::class);
}

}
