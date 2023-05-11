<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Agendamentos extends Model
{
    use HasFactory;
    protected $table = 'user_agendamentos';

    protected $fillable = [
        'agendamentos_id',
        'users_id',
    ];

    public function users()
{
    return $this->belongsTo(User::class, 'users_id');
}
public function agendamentos()
{
    return $this->belongsTo(Agendamentos::class, 'agendamentos_id');
}

}
