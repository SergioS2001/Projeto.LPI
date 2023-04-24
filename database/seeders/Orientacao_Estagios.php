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
                'orientadores_id' =>  '1',
                'estágios_id' => 1,
            ],
        ]);
    }
}