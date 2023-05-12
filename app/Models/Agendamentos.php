<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;
    protected $table = 'agendamentos';

    protected $fillable = [
        'nome',
        'data',
        'descrição',
        'duração',
        'hora',
        'isAccepted',
    ];

    public function histórico_agendamentos()
{
    return $this->hasMany(Histórico_Agendamentos::class);
}

}
