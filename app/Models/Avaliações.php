<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliações extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'estágios_id',
        'nota',
        'isDone',
    ];

    public function estagio()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id');
    }


}
