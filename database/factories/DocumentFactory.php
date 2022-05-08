<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Document;
use App\Models\File;
use App\Models\Patient;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::all()->random()->id,
            'file_id' => File::factory(),
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['jpg', 'pdf', 'jpeg', 'png']),
        ];
    }
}
