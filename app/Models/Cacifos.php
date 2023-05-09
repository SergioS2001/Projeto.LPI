<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacifos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'chave_partilhada',
    ];

    public function cacifo_estagio()
    {
        return $this->hasMany(Cacifo_Estagio::class);
    }

}
