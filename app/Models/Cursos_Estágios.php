<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos_Estágios extends Model
{
    protected $table = 'curso_estagio';

    use HasFactory;

    protected $fillable = [
        'curso',
        'ects',
    ];

    public function estágios()
    {
        return $this->hasMany(Estágios::class);
    }
}
