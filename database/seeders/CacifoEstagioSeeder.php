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
            'estágios_id' => 1,
            'cacifos_id' => 1,
            'fardamento' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Cacifo_Estagio::create([
            'estágios_id' => 2,
            'cacifos_id' => 2,
            'fardamento' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}