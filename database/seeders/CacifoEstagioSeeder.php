<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Cacifos_Estágios;
use Illuminate\Support\Facades\DB;

class CacifoEstagioSeeder extends Seeder
{
    public function run()
    {
        Cacifos_Estágios::create([
            'users_id' => 1,
            'estágios_id' => 1,
            'cacifos_id' => 1,
            'cauções_id' => 1,
            'fardamento' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}