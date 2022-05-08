<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PaymentGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymentGatewayController
 */
class PaymentGatewayControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $paymentGateways = PaymentGateway::factory()->count(3)->create();

        $response = $this->get(route('payment-gateway.index'));
    }
}
