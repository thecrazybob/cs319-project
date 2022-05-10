<?php

namespace Database\Factories;

use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeSlotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeSlot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'starting_time' => $this->faker->dateTimeThisYear(),
            'duration'      => $this->faker->randomElement([15, 30]),
            'capacity'      => $this->faker->numberBetween(0, 5),
        ];
    }
}
