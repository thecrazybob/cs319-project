<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentGateways = [
            ['gateway_name' => 'Credit Card'],
            ['gateway_name' => 'Cash'],
            ['gateway_name' => 'Bank Transfer'],
        ];

        collect($paymentGateways)->each(fn ($gateway) => PaymentGateway::create($gateway));
    }
}
