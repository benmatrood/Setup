<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('fr_FR');

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'sexe_user' => $faker->randomElement(['M', 'F']),
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone_number' => $faker->phoneNumber,
            'password' => bcrypt('password'),
            'avatar' => null,
            'nb_points' => $faker->numberBetween(1, 100),
            'restorant_id' => $faker->numberBetween(1, 10),
            'companie_id' => $faker->numberBetween(1, 10),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
