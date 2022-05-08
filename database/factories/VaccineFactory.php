<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\Vaccine;

class VaccineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vaccine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'vaccine_type' => $this->faker->randomElement(["covid","other"]),
            'vaccine_date' => $this->faker->date(),
            'dose_no' => $this->faker->numberBetween(1, 5),
        ];
    }
}
