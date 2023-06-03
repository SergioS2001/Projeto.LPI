<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionário_Aluno extends Model
{
    use HasFactory;
    protected $table = 'questionario_aluno';

    protected $fillable = [
        'orientação_estagios_id',
        'integração',
        'acompanhamento',
        'aquisição_conhecimentos',
        'disponibilidade',
        'satisfação',
        'apoio_administrativo',
        'apoio_orientador',
        'apreciação_global',
        'sugestões',
    ];

    public function orientação_estagios()
    {
        return $this->belongsTo(Orientação_Estagios::class, 'orientação_estagios_id');
    }

}
