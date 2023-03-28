<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauções extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'isPago',
        'IsDevolvido'
    ];
}
