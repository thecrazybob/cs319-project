<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\SupportMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupportMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'support_id' => Support::all()->random()->id,
            'user_id'    => User::all()->random()->id,
            'message'    => $this->faker->text,
        ];
    }
}
