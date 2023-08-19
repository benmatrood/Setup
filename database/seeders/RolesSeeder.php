<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(['name' => 'Admin']);
        Roles::create(['name' => 'User']);
        Roles::create(['name' => 'Ceo']);
        Roles::create(['name' => 'Manager']);
        Roles::create(['name' => 'Comptabilité']);
        Roles::create(['name' => 'Comptable']);
        Roles::create(['name' => 'Gestionnaire']);
        Roles::create(['name' => 'Administrateur']);
        Roles::create(['name' => 'SuperAdmin']);
    }
}
