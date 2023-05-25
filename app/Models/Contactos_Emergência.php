<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos_Emergência extends Model
{
    use HasFactory;
    protected $table = 'contactos_emergência';

    protected $fillable = [
        'nome',
        'telemóvel',
        'grau_parentesco',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}


    
}
