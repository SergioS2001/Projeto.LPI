<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenças extends Model
{
    use HasFactory;

    protected $fillable = [
        'estágios_id',
        'data',
        'h_entrada',
        'h_saida',
        'horas_dia',
        'horas_mes',
        'count_presenças',
        'isValidated',
    ];

    public function estagio()
    {
        return $this->hasMany(Estágios::class, 'presenças_id');
    }


}
