<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliações extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'isDone',
    ];

    public function estagio()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id');
    }

    public function orientador()
    {
        return $this->belongsTo(Orientadores::class, 'id');
    }

}
