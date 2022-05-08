<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;
use App\Models\User;

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
            'bilkent_id' => $this->faker->word,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(["female","male","other"]),
            'height' => $this->faker->numberBetween(151, 187),
            'weight' => $this->faker->numberBetween(49, 195),
            'allergies' => $this->faker->text,
            'other_illness' => $this->faker->text,
            'current_medications' => $this->faker->text,
            'smoking' => $this->faker->boolean,
        ];
    }
}
