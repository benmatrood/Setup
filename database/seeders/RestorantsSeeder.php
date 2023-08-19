<?php

namespace Database\Seeders;

use App\Models\Restorants;
use Illuminate\Database\Seeder;


class RestorantsSeeder extends Seeder
{
    public function run()
    {
        Restorants::factory()->count(10)->create();
    }
}
