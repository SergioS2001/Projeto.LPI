<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Serviços;

class ServiçosSeeder extends Seeder
{
    public function run()
    {
        Serviços::create([
            'titulo' => 'Aprovisionamento',
            'nome_responsavel' => 'Responsável 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Bloco Operatório',
            'nome_responsavel' => 'Responsável 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'CEFES',
            'nome_responsavel' => 'Responsável 3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Consulta Externa',
            'nome_responsavel' => 'Responsável 4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Faturação',
            'nome_responsavel' => 'Responsável 5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Gabinete de Comunicação',
            'nome_responsavel' => 'Responsável 6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Imagiologia',
            'nome_responsavel' => 'Responsável 7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Internamento Médico Cirúrgico (IMC)',
            'nome_responsavel' => 'Responsável 8',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Medicina - Oftalmologia',
            'nome_responsavel' => 'Responsável 9',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Medicina - Pediatria',
            'nome_responsavel' => 'Responsável 10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Medicina - Psiquiatria',
            'nome_responsavel' => 'Responsável 11',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Medicina Dentária',
            'nome_responsavel' => 'Responsável 12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Medicina Física e Reabilitação (MFR)',
            'nome_responsavel' => 'Responsável 13',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Saúde e Risco Ocupacional',
            'nome_responsavel' => 'Responsável 14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Serviço de Urgência',
            'nome_responsavel' => 'Responsável 15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Serviços Farmacêuticos',
            'nome_responsavel' => 'Responsável 16',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Tesouraria',
            'nome_responsavel' => 'Responsável 17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Unidade de Cuidados Continuados (UCC)',
            'nome_responsavel' => 'Responsável 18',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Serviços::create([
            'titulo' => 'Unidade de Convalescença, Reabilitação e Manutenção (UCRM)',
            'nome_responsavel' => 'Responsável 19',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}