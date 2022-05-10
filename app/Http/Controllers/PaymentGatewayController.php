<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paymentGateways = PaymentGateway::all();
    }
}
