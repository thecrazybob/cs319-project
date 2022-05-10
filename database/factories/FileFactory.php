<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = $this->faker->file('storage/app/sample-files', 'storage/app/public', false);

        return [
            'patient_id' => Patient::all()->random()->id,
            'name'       => $this->faker->name,
            'type'       => pathinfo($filePath, PATHINFO_EXTENSION),
            'file_path'  => $filePath,
        ];
    }
}
