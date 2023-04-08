<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'testUser',
             'email' => 'test@example.com',
         ]);
         $this->call([CacifosSeeder::class,],);
         $this->call([CursoEstagioSeeder::class,],);
         $this->call([InstituiçãoSeeder::class,],);
         $this->call([ServiçosSeeder::class,],);
         $this->call([TipoAgendamentoSeeder::class,],);
         $this->call([TipologiaEstagioSeeder::class,],);
         $this->call([AgendamentosSeeder::class,],);
         $this->call([PresençasSeeder::class,],);
         $this->call([AvaliaçõesSeeder::class,],);
         $this->call([UnidadeCurricularSeeder::class,],);
         $this->call([EstágiosSeeder::class,],);
         $this->call([HistóricoSeeder::class,],);
    }
}
