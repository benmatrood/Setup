<?php

namespace Database\Factories;

use App\Models\Bookings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => null,
            'end_date' => null,
            'user_id' => $this->faker->numberBetween(1, 30),
            'house_id' => $this->faker->numberBetween(1, 31),
            'bookingstatu_id' => $this->faker->numberBetween(1, 2)
        ];
    }
}
