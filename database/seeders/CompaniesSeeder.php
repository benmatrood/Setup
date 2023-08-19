<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Companies;

class CompaniesSeeder extends Seeder
{
    public function run()
    {
        Companies::factory()->count(10)->create();
    }
}
