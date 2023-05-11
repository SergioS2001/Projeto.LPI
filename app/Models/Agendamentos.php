<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'nome',
        'data',
        'descrição',
        'duração',
        'hora',
        'isAccepted',
    ];

    public function user_agendamentos()
{
    return $this->hasMany(User_Agendamentos::class);
}

}
