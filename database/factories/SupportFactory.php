<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Patient;
use App\Models\Support;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => Department::all()->random()->id,
            'patient_id'    => Patient::all()->random()->id,
            'subject'       => $this->faker->word,
            'status'        => $this->faker->randomElement(['new', 'answered', 'awaiting', 'hold', 'closed', 'reopened']),
            'priority'      => $this->faker->randomElement(['low', 'medium', 'high', 'critical']),
        ];
    }
}
