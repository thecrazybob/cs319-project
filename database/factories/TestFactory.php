<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\File;
use App\Models\Patient;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'    => Patient::all()->random()->id,
            'doctor_id'     => Doctor::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'file_id'       => File::factory(),
            'test_type'     => $this->faker->randomElement(['pcr', 'regular']),
            'test_date'     => $this->faker->dateTimeThisYear(),
        ];
    }
}
