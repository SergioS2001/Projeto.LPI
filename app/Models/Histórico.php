<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histórico extends Model
{
    use HasFactory;
    protected $table = 'historico';

    protected $fillable = [
        'users_id',
        'estágios_id',
        'presenças_id',
    ];


    public function estagio()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id');
    }

    public function presenças()
    {
        return $this->belongsTo(Presenças::class, 'presenças_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}

}
