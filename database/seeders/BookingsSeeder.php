<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookings;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.

     */
    public function run(): void
    {
        //
        Bookings::factory()->count(20)->create();
    }
}
