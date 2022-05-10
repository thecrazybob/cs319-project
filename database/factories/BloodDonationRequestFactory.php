<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BloodDonationRequest;
use App\Models\Patient;

class BloodDonationRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodDonationRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::all()->random()->id,
            'blood_type' => $this->faker->randomElement(["AA","AO","BB","BO","AB","OO"]),
            'urgency' => $this->faker->randomElement(["low","medium","high","critical"]),
            'approved' => $this->faker->boolean,
        ];
    }
}
