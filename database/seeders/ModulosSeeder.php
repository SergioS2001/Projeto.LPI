<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Modulos;
use Illuminate\Support\Facades\DB;

class ModulosSeeder extends Seeder
{
    public function run()
    {
        Modulos::create([
            'nome' => 'Modulo1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Modulos::create([
            'nome' => 'Modulo2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}