<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SupportMessageController
 */
class SupportMessageControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $supportMessages = SupportMessage::factory()->count(3)->create();

        $response = $this->get(route('support-message.index'));

        $response->assertOk();
        $response->assertViewIs('support.show');
        $response->assertViewHas('messages');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SupportMessageController::class,
            'store',
            \App\Http\Requests\SupportMessageStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $message = $this->faker->text;

        $response = $this->post(route('support-message.store'), [
            'message' => $message,
        ]);

        $supportMessages = SupportMessage::query()
            ->where('message', $message)
            ->get();
        $this->assertCount(1, $supportMessages);
        $supportMessage = $supportMessages->first();

        $response->assertRedirect(route('support.show', [$support_id]));
    }
}
