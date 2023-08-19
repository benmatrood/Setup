<?php

namespace Database\Factories;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;



class CompaniesFactory extends Factory
{
    protected $model = Companies::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('fr_FR');

        return [
            'name' => $faker->company,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'description' => $faker->paragraph,
            'logo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
