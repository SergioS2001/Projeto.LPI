<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Orientadores;

class OrientadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orientadores = [
            [
                'users_id' => 1,
                'created_at' => now(),
            'updated_at' => now(),
            ],
        ];

        foreach ($orientadores as $orientador) {
            Orientadores::create($orientador);
        }
    }
}