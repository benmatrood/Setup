<?php

namespace Database\Factories;

use App\Models\Houses;
use Illuminate\Database\Eloquent\Factories\Factory;

class HousesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Houses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'sector' => $this->faker->word,
            'town' => $this->faker->city,
            'certification' => $this->faker->numberBetween(0, 1),
            'price' => $this->faker->numberBetween(1000, 5000),
            'Point' => $this->faker->numberBetween(1000, 5000),
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'image' => null,
            'image1' => null,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,
            'image6' => null,
            'image7' => null,
            'video' => null,
            'housetype_id' => 1,
            'housecategory_id' => 1,
            'equipment_id' => 1,
            'companie_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
