<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\File;
use App\Models\Patient;

class DiagnosisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnosis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::factory(),
            'patient_id' => Patient::factory(),
            'department_id' => Department::all()->random()->id,
            'file_id' => File::factory(),
            'diagnosis_date' => $this->faker->date(),
            'diagnosis_type' => $this->faker->word,
        ];
    }
}
