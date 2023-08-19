<?php

namespace Database\Factories;

use App\Models\Equipments;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EquipmentsFactory extends Factory
{
    protected $model = Equipments::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('fr_FR');

        return [
            'name' => $faker->name,
            'image' => null,
        ];
    }
}
