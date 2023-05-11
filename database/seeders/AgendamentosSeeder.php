<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Agendamentos;
use Illuminate\Support\Facades\DB;

class AgendamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('agendamentos')->insert([
            [
                'users_id' =>  1,
                'evento_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' =>  1,
                'evento_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}