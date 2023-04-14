<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Agendamento extends Model
{
    protected $table = 'tipo_agendamento';

    use HasFactory;

    protected $fillable = [
        'nome_evento',
    ];

    public function agendamentos()
{
    return $this->hasMany(Agendamentos::class, 'tipo_agendamento_id');
}

}
