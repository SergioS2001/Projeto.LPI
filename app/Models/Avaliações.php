<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliações extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'isDone',
    ];

}
