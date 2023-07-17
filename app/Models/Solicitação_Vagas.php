<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitação_Vagas extends Model
{
    protected $table = 'solicitacao_vagas';

    use HasFactory;

    protected $fillable = [
        'estágios_id',
        'designação',
        'ano_letivo',
        'vagas',
        'carga_horaria_total',
        'objetivos',
        'metodologia_avaliação',
    ];

    public function estagio()
{
    return $this->belongsTo(Estágios::class, 'estágios_id');
}


}
