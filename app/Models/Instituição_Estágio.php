<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituição_Estágio extends Model
{
    protected $table = 'instituicao_estagio';

    use HasFactory;

    protected $fillable = [
        'nome',
        'sigla',
    ];

    public function estagio()
    {
        return $this->hasMany(Estágios::class);
    }
}
