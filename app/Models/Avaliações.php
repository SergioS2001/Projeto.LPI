<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliações extends Model
{
    use HasFactory;

    protected $table = 'avaliações';
    protected $fillable = [
        'orientação_estagios_id',
        'module_count',
        'nota_final',
        'isDone',
    ];

    public function orientação_estagios()
    {
        return $this->belongsTo(Orientação_Estagios::class, 'orientação_estagios_id');
    }

}
