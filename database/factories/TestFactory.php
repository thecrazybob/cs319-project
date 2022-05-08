<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\File;
use App\Models\Patient;
use App\Models\Test;

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
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
            'department_id' => Department::factory(),
            'file_id' => File::factory(),
            'test_type' => $this->faker->randomElement(["pcr","regular"]),
            'test_date' => $this->faker->dateTime(),
        ];
    }
}
