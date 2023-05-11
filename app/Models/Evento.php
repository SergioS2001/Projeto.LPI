<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'evento';

    protected $fillable = [
        'users_id',
        'nome',
        'data',
        'descrição',
        'duração',
        'hora',
        'isAccepted',
    ];

    public function agendamentos()
{
    return $this->hasMany(Agendamentos::class);
}

}
