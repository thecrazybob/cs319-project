<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\PaymentGateway;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id'         => Invoice::all()->random()->id,
            'payment_gateway_id' => PaymentGateway::all()->random()->id,
            'amount'             => $this->faker->randomFloat(2, 0, 499.99),
            'description'        => $this->faker->text,
        ];
    }
}
