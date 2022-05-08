<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Support;
use App\Models\SupportMessage;
use App\Models\User;

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
            'support_id' => Support::factory(),
            'user_id' => User::factory(),
            'message' => $this->faker->text,
        ];
    }
}
