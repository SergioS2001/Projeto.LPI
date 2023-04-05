<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Serviços;

class ServiçosSeeder extends Seeder
{
    public function run()
    {
        Serviços::create([
            'titulo' => 'Serviço 1',
            'nome_responsavel' => 'Responsável 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Serviços::create([
            'titulo' => 'Serviço 2',
            'nome_responsavel' => 'Responsável 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Serviços::create([
            'titulo' => 'Serviço 3',
            'nome_responsavel' => 'Responsável 3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
