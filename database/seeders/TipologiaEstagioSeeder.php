<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Tipologia_Estágio;

class TipologiaEstagioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipologia_Estágio::create([
            'titulo' => 'Estágio Curricular Obrigatório',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Tipologia_Estágio::create([
            'titulo' => 'Estágio Curricular Não Obrigatório',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Tipologia_Estágio::create([
            'titulo' => 'Estágio Profissional',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}