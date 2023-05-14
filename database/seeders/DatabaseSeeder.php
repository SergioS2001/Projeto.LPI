<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'testUser',
             'email' => 'test@example.com',
             'isExterno' => true,
             'isOrientador' => true,
         ]);
         $this->call(InstituicaoAlunoSeeder::class);
         $this->call(CursoAlunoSeeder::class);
         $this->call(CacifosSeeder::class);
         $this->call(CursoEstagioSeeder::class);
         $this->call(InstituiçãoSeeder::class);
         $this->call(ServiçosSeeder::class);
         $this->call(TipologiaEstagioSeeder::class);
         $this->call(AgendamentosSeeder::class);
         $this->call(UnidadeCurricularSeeder::class);
         $this->call(SolicitaçãoVagasSeeder::class);
         $this->call(EstágiosSeeder::class);
         $this->call(OrientadoresSeeder::class);
         $this->call(Orientacao_Estagios::class);
         $this->call(AvaliaçõesSeeder::class);
         $this->call(ModulosSeeder::class);
         $this->call(AvaliacaoModulosSeeder::class);
         $this->call(PresençasSeeder::class);
         $this->call(CacifoEstagioSeeder::class);
         $this->call(HistoricoAgendamentosSeeder::class);
    }
}
