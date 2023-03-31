<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histórico extends Model
{
    use HasFactory;
    protected $table = 'historico';

    protected $fillable = [
        'agendamentos_id',
        'estágios_id',
    ];
}
