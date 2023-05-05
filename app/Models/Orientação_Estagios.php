<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientação_Estagios extends Model
{
    use HasFactory;
    protected $table = 'orientação_estagios';

    protected $fillable = [
        'orientadores_id',
        'estágios_id',
    ];

    public function estágios()
{
    return $this->belongsTo(Estágios::class, 'estágios_id');
}

public function orientador()
{
    return $this->belongsTo(Orientadores::class, 'orientadores_id');
}

}
