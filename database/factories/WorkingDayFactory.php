<?php

namespace Database\Factories;

use App\Models\WorkingDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkingDayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkingDay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
