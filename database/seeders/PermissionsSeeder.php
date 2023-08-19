<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::create(['name' => 'Create']);
        Permissions::create(['name' => 'Read']);
        Permissions::create(['name' => 'Update']);
        Permissions::create(['name' => 'Delete']);
        // Ajoutez d'autres permissions si nécessaire
    }
}
