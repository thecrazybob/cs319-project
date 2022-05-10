<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'patient_id'  => Patient::all()->random()->id,
            'amount'      => $this->faker->randomFloat(0, 0, 9999.99),
            'status'      => $this->faker->randomElement(['unpaid', 'paid', 'cancelled', 'refunded', 'partial']),
            'description' => $this->faker->sentence(3),
        ];
    }
}
