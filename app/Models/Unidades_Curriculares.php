<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidades_Curriculares extends Model
{
    protected $table = 'unidade_curricular';

    use HasFactory;
    protected $fillable = [
        'nome',
    ];

    public function estagio()
    {
        return $this->hasMany(Estágios::class);
    }
}
