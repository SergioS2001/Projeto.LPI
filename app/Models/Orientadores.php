<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'celula_profissional',
        'admissao',
        'validade',
        'responsavel_assinatura'
    ];

    public function users()
{
    return $this->belongsTo(User::class, 'users_id');
}

public function orientação_estagios()
{
    return $this->hasMany(Orientação_Estagios::class);
}

}
