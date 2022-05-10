<?php

namespace Database\Factories;

use App\Models\BloodDonationRequest;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'blood_type' => $this->faker->randomElement(['AA', 'AO', 'BB', 'BO', 'AB', 'OO']),
            'urgency'    => $this->faker->randomElement(['low', 'medium', 'high', 'critical']),
            'approved'   => $this->faker->boolean,
        ];
    }
}
