<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientacao_Estagios extends Model
{
    use HasFactory;
    protected $table = 'orientacao_estagios';

    protected $fillable = [
        'orientadores_id',
        'estágios_id',
    ];
}
