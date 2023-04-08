<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao_Vagas extends Model
{
    protected $table = 'solicitacao_vagas';

    use HasFactory;

    protected $fillable = [
        'ano_letivo',
        'vagas',
        'carga_horaria_total',
        'objetivos',
        'isExterno',
    ];
}
