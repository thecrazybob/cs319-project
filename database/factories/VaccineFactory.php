<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'patient_id' => Patient::all()->random()->id,
            'vaccine_type' => $this->faker->randomElement(["covid","other"]),
            'vaccine_date' => $this->faker->date(),
            'file_id' => File::factory(),
            'dose_no' => $this->faker->numberBetween(1, 5),
        ];
    }
}
