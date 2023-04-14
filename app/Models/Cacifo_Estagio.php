<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacifo_Estagio extends Model
{
    use HasFactory;

    protected $fillable = [
        'estágios_id',
        'cacifos_id',
    ];

}
