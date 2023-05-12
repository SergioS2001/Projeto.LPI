<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientação_Estagios extends Model
{
    use HasFactory;
    protected $table = 'orientação_estagios';

    protected $fillable = [
        'users_id',
        'estágios_id',
        'orientadores_id',
        'horario_apresentacao',
        'rating_aluno_estagio',
        'sugestões_aluno',
        'questionario_done',
    ];

//    public function estágios()
//{
//    return $this->belongsTo(Estágios::class, 'estágios_id');
//}

public function orientador()
{
    return $this->belongsTo(Orientadores::class, 'orientadores_id');
}
public function estágios()
{
    return $this->belongsTo(Estágios::class, 'estágios_id');
}

    public function users()
{
    return $this->belongsTo(User::class, 'users_id');
}

public function presenças()
{
    return $this->hasMany(Presenças::class);
}
public function avaliação()
{
    return $this->hasMany(Avaliações::class);
}

}
