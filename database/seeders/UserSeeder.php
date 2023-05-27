<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the users table with random users.
     */
    public function run()
{
    User::factory()->count(10)->create([
        'isExterno' => true,
    ]);
}

}