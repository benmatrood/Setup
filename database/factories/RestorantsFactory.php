<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restorants;

class RestorantsFactory extends Factory
{
    protected $model = Restorants::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('fr_FR');

        return [
            'name' => $faker->company,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'localisation' => $faker->address,
            'description' => $faker->paragraph,
            'Longitude' => $faker->longitude,
            'Latitude' => $faker->latitude,
            'logo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
