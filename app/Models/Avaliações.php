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
        'fileSigned',
    ];

    public function orientação_estagios()
    {
        return $this->belongsTo(Orientação_Estagios::class, 'orientação_estagios_id');
    }

}
