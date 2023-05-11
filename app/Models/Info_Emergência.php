<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Emergência extends Model
{
    use HasFactory;
    protected $table = 'info_emergência';

    protected $fillable = [
        'nome',
        'telemóvel',
        'grau_parentesco',
    ];

}
