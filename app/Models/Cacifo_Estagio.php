<?php

namespace App\Models;

use Database\Seeders\EstágiosSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacifo_Estagio extends Model
{
    use HasFactory;
    protected $table = 'cacifo_estagio';

    protected $fillable = [
        'estágios_id',
        'cacifos_id',
        'fardamento',
    ];

    public function estágios()
    {
        return $this->belongsTo(Estágios::class, 'estágios_id');
    }

    public function cacifos()
    {
        return $this->belongsTo(Cacifos::class, 'cacifos_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
