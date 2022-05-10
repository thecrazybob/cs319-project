<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaymentGateway;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TransactionController
 */
class TransactionControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $transactions = Transaction::factory()->count(3)->create();

        $response = $this->get(route('transaction.index'));

        $response->assertOk();
        $response->assertViewIs('transaction.index');
        $response->assertViewHas('transactions');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TransactionController::class,
            'store',
            \App\Http\Requests\TransactionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $amount = $this->faker->randomFloat(/** double_attributes **/);
        $description = $this->faker->text;

        $response = $this->post(route('transaction.store'), [
            'amount'      => $amount,
            'description' => $description,
        ]);

        $transactions = Transaction::query()
            ->where('amount', $amount)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $transactions);
        $transaction = $transactions->first();

        $response->assertRedirect(route('transaction.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TransactionController::class,
            'update',
            \App\Http\Requests\TransactionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $transaction = Transaction::factory()->create();
        $invoice = Invoice::factory()->create();
        $payment_gateway = PaymentGateway::factory()->create();
        $amount = $this->faker->randomFloat(/** double_attributes **/);
        $description = $this->faker->text;

        $response = $this->put(route('transaction.update', $transaction), [
            'invoice_id'         => $invoice->id,
            'payment_gateway_id' => $payment_gateway->id,
            'amount'             => $amount,
            'description'        => $description,
        ]);

        $transaction->refresh();

        $response->assertRedirect(route('transaction.index'));

        $this->assertEquals($invoice->id, $transaction->invoice_id);
        $this->assertEquals($payment_gateway->id, $transaction->payment_gateway_id);
        $this->assertEquals($amount, $transaction->amount);
        $this->assertEquals($description, $transaction->description);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->delete(route('transaction.destroy', $transaction));

        $response->assertRedirect(route('transaction.index'));

        $this->assertDeleted($transaction);
    }
}
