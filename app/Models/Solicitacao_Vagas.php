<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao_Vagas extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano_letivo',
        'vagas',
        'isExterno',
    ];
}
