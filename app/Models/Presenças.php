<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenças extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'h_entrada',
        'h_saida',
        'horas_mes',
        'count_dias',
    ];
}
