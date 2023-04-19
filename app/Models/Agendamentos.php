<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_agendamento_id',
        'data',
        'descrição',
        'duração',
    ];

    public function tipo_agendamento()
{
    return $this->belongsTo(Tipo_Agendamento::class, 'tipo_agendamento_id');
}

public function historico()
{
    return $this->hasMany(Histórico::class, 'agendamentos_id');
}

}
