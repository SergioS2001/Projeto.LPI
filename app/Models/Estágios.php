<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estágios extends Model
{
    use HasFactory;
    protected $table = 'estágios';

    protected $fillable = [
        'id',
        'nome',
        'data_inicial',
        'data_final',
        'instituição_estagio_id',
        'curso_estagio_id',
        'unidade_curricular_id',
        'serviços_id',
        'tipologia_estagio_id',
        'avaliacao_id',
        'isExterno',
        'solicitacao_vagas_id',
        'isSolicitado',
        'isAdmitido',
    ];

    public function serviços()
    {
        return $this->belongsTo(Serviços::class, 'serviços_id');
    }

    public function tipologia_estagio()
    {
        return $this->belongsTo(Tipologia_Estágio::class, 'tipologia_estagio_id');
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
        return $this->belongsTo(Unidades_Curriculares::class, 'unidade_curricular_id');
    }

    public function curso_estagio()
    {
        return $this->belongsTo(Cursos_Estágios::class, 'curso_estagio_id');
    }


    public function solicitacao_vagas()
    {
        return $this->belongsTo(Solicitação_Vagas::class, 'solicitacao_vagas_id');
    }

    public function orientação_estagios()
    {
        return $this->hasMany(Orientação_Estagios::class);
    }

    public function cacifo_estagio()
    {
        return $this->hasMany(Cacifos_Estágios::class);
    }

    public function instituicaoEstagio()
    {
       return $this->belongsTo(Instituição_Estágio::class);
    }

    public function presenças()
    {
       return $this->hasMany(Presenças::class);
    }

    public function agendamentos()
{
    return $this->hasMany(Agendamentos::class);
}
}
