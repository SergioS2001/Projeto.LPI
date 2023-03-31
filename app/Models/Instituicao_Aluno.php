<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao_Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'numero_aluno',
        'curso_aluno_id',
    ];
}
