<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->state([
                'staff' => false,
            ]),
            'bilkent_id'          => 2 .$this->faker->numberBetween(1, 2).$this->faker->randomNumber(6, true),
            'birth_date'          => $this->faker->dateTime(),
            'gender'              => $this->faker->randomElement(['female', 'male', 'other']),
            'height'              => $this->faker->numberBetween(151, 187),
            'weight'              => $this->faker->numberBetween(49, 195),
            'allergies'           => $this->faker->text,
            'other_illness'       => $this->faker->text,
            'current_medications' => $this->faker->text,
            'operations'          => $this->faker->text,
            'smoking'             => $this->faker->boolean,
        ];
    }
}
