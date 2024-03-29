<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Aluno extends Model
{
    protected $table = 'curso_aluno';
    use HasFactory;
    protected $fillable = [
        'curso',
        'ects',
    ];
    public function instituicao_aluno()
{
    return $this->hasMany(Instituicao_Aluno::class, 'curso_aluno_id');
}


}
