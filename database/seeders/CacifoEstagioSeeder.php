<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Cacifo_Estagio;
use Illuminate\Support\Facades\DB;

class CacifoEstagioSeeder extends Seeder
{
    public function run()
    {
        Cacifo_Estagio::create([
            'users_id' => 1,
            'estágios_id' => 1,
            'cacifos_id' => 1,
            'cauções_id' => 1,
            'fardamento' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Cacifo_Estagio::create([
            'users_id' => 1,
            'estágios_id' => 2,
            'cacifos_id' => 2,
            'cauções_id' => 2,
            'fardamento' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}