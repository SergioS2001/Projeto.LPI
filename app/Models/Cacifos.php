<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacifos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_cacifo',
        'cauções_id',
    ];
}
