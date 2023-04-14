<?php

namespace App\Models;

use Database\Seeders\EstágiosSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacifo_Estagio extends Model
{
    use HasFactory;

    protected $fillable = [
        'estágios_id',
        'cacifos_id',
    ];

    public function estágios()
    {
        return $this->belongsTo(EstágiosSeeder::class, 'estágios_id');
    }

    public function cacifos()
    {
        return $this->belongsTo(Cacifos::class, 'cacifos_id');
    }

}
