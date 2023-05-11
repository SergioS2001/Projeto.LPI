<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamentos extends Model
{
    use HasFactory;
    protected $table = 'agendamentos';

    protected $fillable = [
        'evento_id',
        'users_id',
    ];

    public function users()
{
    return $this->belongsTo(User::class, 'users_id');
}
public function evento()
{
    return $this->belongsTo(Evento::class, 'evento_id');
}

}
