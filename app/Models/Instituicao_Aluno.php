<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao_Aluno extends Model
{
    protected $table = 'instituicao_aluno';

    use HasFactory;

    protected $fillable = [
        'nome',
        'numero_aluno',
        'curso_aluno_id',
    ];

    public function curso_aluno()
{
    return $this->belongsTo(Curso_Aluno::class, 'curso_aluno_id');
}

}
