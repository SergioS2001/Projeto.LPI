<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoModulos extends Model
{
    use HasFactory;
    protected $table = 'avaliacao_modulos';

    protected $fillable = [
        'avaliações_id',
        'modulos_id',
    ];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliações::class, 'avaliações_id');
    }
    public function modulo()
    {
        return $this->belongsTo(Modulos::class, 'modulos_id');
    }

}
