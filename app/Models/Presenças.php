<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenças extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'estágios_id',
        'data',
        'h_entrada',
        'h_saida',
        'tempo_pausa',
        'horas_dia',
        'horas_mes',
        'count_presenças',
        'isValidated',
    ];

    public function estagio()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id');
    }


}
