<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviços extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'nome_responsavel',
    ];

    public function estagio()
    {
        return $this->hasMany(Estágios::class);
    }
}
