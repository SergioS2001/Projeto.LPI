<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenças extends Model
{
    use HasFactory;
    protected $table = 'presenças';

    protected $fillable = [
        'orientação_estagios_id',
        'data',
        'h_entrada',
        'h_saida',
        'tempo_pausa',
        'horas_dia',
        'horas_mes',
        'count_presenças',
        'isValidated',
    ];

    public function orientação_estagios()
    {
        return $this->belongsTo(Orientação_Estagios::class, 'orientação_estagios_id');
    }
}
