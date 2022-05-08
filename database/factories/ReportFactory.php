<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Report;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

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
            'subject' => $this->faker->word,
            'days' => $this->faker->numberBetween(-10000, 10000),
            'report_date' => $this->faker->date(),
            'report_type' => $this->faker->word,
        ];
    }
}
