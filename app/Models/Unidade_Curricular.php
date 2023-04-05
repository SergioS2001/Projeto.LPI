<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade_Curricular extends Model
{
    protected $table = 'unidade_curricular';

    use HasFactory;

    protected $fillable = [
        'nome',
    ];
}
