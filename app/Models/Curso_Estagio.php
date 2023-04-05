<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Estagio extends Model
{
    protected $table = 'curso_estagio';

    use HasFactory;

    protected $fillable = [
        'curso',
        'ects',
    ];

}
