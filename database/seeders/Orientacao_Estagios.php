<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Orientação_Estagios;
use Illuminate\Support\Facades\DB;

class Orientacao_Estagios extends Seeder
{
    public function run()
    {
        DB::table('orientação_estagios')->insert([
            [
                'users_id' => 1,
                'orientadores_id' =>  '1',
                'estágios_id' => 1,
                'horario_apresentacao' => '2023-01-01 8h',
            ],
        ]);
    }
}