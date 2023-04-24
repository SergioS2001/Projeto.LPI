<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Estagio extends Model
{
    protected $table = 'estado_estagio';

    use HasFactory;

    public function estagio()
    {
        return $this->hasMany(Estágios::class);
    }
}
