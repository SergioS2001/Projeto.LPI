<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estágios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_inicial',
        'data_final',
        'instituição_estagio_id',
        'curso_estagio_id',
        'unidade_curricular_id',
        'serviços_id',
        'tipologia_estagio_id',
        'presenças_id',
        'cacifos_id',
        'avaliacao_id',
        'solicitacao_vagas_id',
        'estado_estagio_id',
    ];
}
