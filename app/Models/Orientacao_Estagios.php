<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientacao_Estagios extends Model
{
    use HasFactory;
    protected $table = 'orientacao_estagios';

    protected $fillable = [
        'orientadores_id',
        'estágios_id',
    ];

    public function estagios()
{
    return $this->belongsTo(Estágio::class, 'estágios_id');
}

public function orientador()
{
    return $this->belongsTo(Orientadores::class, 'orientadores_id');
}

}
