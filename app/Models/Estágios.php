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
        'instituicao_estagio_id',
        'curso_estagio_id',
        'unidade_curricular_id',
        'serviços_id',
        'tipologia_estagio_id',
        'presenças_id',
        'avaliacao_id',
        'solicitacao_vagas_id',
        'estado_estagio_id',
    ];

    public function serviços()
    {
        return $this->belongsTo(Serviços::class, 'serviços_id');
    }

    public function tipologia_estagio()
    {
        return $this->belongsTo(Tipologia_Estágio::class, 'tipologia_estagio_id');
    }

    public function avaliações()
    {
        return $this->belongsTo(Avaliações::class, 'avaliacao_id');
    }

    public function presenças()
    {
        return $this->belongsTo(Presenças::class, 'presenças_id');
    }

    public function cacifos()
    {
        return $this->belongsTo(Cacifos::class, 'cacifos_id');
    }

    public function instituicao_estagio()
    {
       return $this->belongsTo(Instituição_Estágio::class, 'instituição_estagio_id');
    }

    public function unidade_curricular()
    {
        return $this->belongsTo(Unidade_Curricular::class, 'unidade_curricular_id');
    }

    public function curso_estagio()
    {
        return $this->belongsTo(Curso_Estagio::class, 'curso_estagio_id');
    }

    public function estado_estagio()
    {
        return $this->belongsTo(Estado_Estagio::class, 'estado_estagio_id');
    }

    public function solicitacao_vagas()
    {
        return $this->belongsTo(Solicitação_Vagas::class, 'solicitacao_vagas_id');
    }

    public function historico()
    {
        return $this->hasMany(Histórico::class);
    }

    public function cacifo_estagio()
    {
        return $this->hasMany(Cacifo_Estagio::class);
    }
}
