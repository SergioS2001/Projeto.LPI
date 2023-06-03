<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;
    protected $table = 'agendamentos';

    protected $fillable = [
        'estágios_id',
        'nome',
        'data',
        'descrição',
        'hora_fim',
        'hora',
        'isAccepted',
    ];

    public function histórico_agendamentos()
{
    return $this->hasMany(Histórico_Agendamentos::class);
}

public function estágios()
{
    return $this->belongsTo(Estágios::class, 'estágios_id');
}

}
