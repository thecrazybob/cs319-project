<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\InvoiceController
 */
class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $invoices = Invoice::factory()->count(3)->create();

        $response = $this->get(route('invoice.index'));

        $response->assertOk();
        $response->assertViewIs('invoice.index');
        $response->assertViewHas('invoices');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $invoice = Invoice::factory()->create();

        $response = $this->get(route('invoice.show', $invoice));

        $response->assertOk();
        $response->assertViewIs('invoice.show');
        $response->assertViewHas('invoice');
    }
}
