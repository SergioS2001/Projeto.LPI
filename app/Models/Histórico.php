<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histórico extends Model
{
    use HasFactory;
    protected $table = 'historico';

    protected $fillable = [
        'users_id',
        'agendamentos_id',
        'estágios_id',
    ];

    public function agendamentos()
    {
        return $this->belongsTo(Agendamentos::class, 'agendamentos_id');
    }

    public function estagio()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id')->withDefault();
    }
}
