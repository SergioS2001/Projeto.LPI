<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Estado_Estagio;
use Illuminate\Support\Facades\DB;

class EstadoEstágioSeeder extends Seeder
{
    public function run()
    {
        Estado_Estagio::create([
            'solicitado' => false,
            'waiting' => false,
            'admitido' => false,
        ]);

        Estado_Estagio::create([
            'solicitado' => true,
            'waiting' => false,
            'admitido' => false,
        ]);

        Estado_Estagio::create([
            'solicitado' => false,
            'waiting' => true,
            'admitido' => false,
        ]);
        
        Estado_Estagio::create([
            'solicitado' => false,
            'waiting' => false,
            'admitido' => true,
        ]);
    }
}