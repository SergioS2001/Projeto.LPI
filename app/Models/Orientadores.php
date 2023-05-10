<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orientadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'horario_apresentacao',
    ];

    public function users()
{
    return $this->belongsTo(User::class, 'users_id');
}

public function orientacao_estagios()
{
    return $this->hasMany(Orientação_Estagios::class);
}

}
