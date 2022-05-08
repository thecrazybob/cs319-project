<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Invoice;
use App\Models\Patient;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'amount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->randomElement(["unpaid","paid","cancelled","refunded","partial"]),
            'description' => $this->faker->text,
        ];
    }
}
