<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histórico_Agendamentos extends Model
{
    use HasFactory;
    protected $table = 'historico_agendamentos';

    protected $fillable = [
        'agendamentos_id',
        'orientação_estagios_id',
    ];

    public function agendamentos()
{
    return $this->belongsTo(Agendamentos::class, 'agendamentos_id');
}
public function orientação_estagios()
{
    return $this->belongsTo(Orientação_Estagios::class, 'orientação_estagios_id');
}

}
