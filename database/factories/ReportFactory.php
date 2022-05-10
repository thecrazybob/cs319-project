<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\File;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'patient_id'  => Patient::all()->random()->id,
            'doctor_id'   => Doctor::all()->random()->id,
            'file_id'     => File::factory(),
            'subject'     => $this->faker->word,
            'days'        => $this->faker->numberBetween(1, 180),
            'report_date' => $this->faker->dateTimeThisYear(),
            'report_type' => $this->faker->word,
        ];
    }
}
