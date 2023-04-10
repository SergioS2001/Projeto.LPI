<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'descrição',
        'duração',
    ];

    public function tipo_agendamentos()
{
    return $this->belongsTo(Tipo_Agendamento::class, 'tipo_agendamento_id');
}

}
