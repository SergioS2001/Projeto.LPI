<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologia_Estágio extends Model
{
    protected $table = 'tipologia_estagio';

    use HasFactory;

    protected $fillable = [
        'titulo',
    ];

    public function estagio()
    {
        return $this->belongsTo(Estágios::class);
    }
}
