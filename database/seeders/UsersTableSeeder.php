<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Créer 10 utilisateurs avec des données aléatoires
        User::factory()->count(10)->create();
    }
}
