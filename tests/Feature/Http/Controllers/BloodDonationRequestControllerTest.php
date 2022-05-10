<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BloodDonationRequest;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BloodDonationRequestController
 */
class BloodDonationRequestControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $bloodDonationRequests = BloodDonationRequest::factory()->count(3)->create();

        $response = $this->get(route('blood-donation-request.index'));

        $response->assertOk();
        $response->assertViewIs('blood-donation-request.index');
        $response->assertViewHas('requests');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('blood-donation-request.create'));

        $response->assertOk();
        $response->assertViewIs('blood-donation-request.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BloodDonationRequestController::class,
            'store',
            \App\Http\Requests\BloodDonationRequestStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $blood_type = $this->faker->randomElement(/** enum_attributes **/);
        $urgency = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('blood-donation-request.store'), [
            'blood_type' => $blood_type,
            'urgency'    => $urgency,
        ]);

        $bloodDonationRequests = BloodDonationRequest::query()
            ->where('blood_type', $blood_type)
            ->where('urgency', $urgency)
            ->get();
        $this->assertCount(1, $bloodDonationRequests);
        $bloodDonationRequest = $bloodDonationRequests->first();

        $response->assertRedirect(route('blood-donation-request.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BloodDonationRequestController::class,
            'update',
            \App\Http\Requests\BloodDonationRequestUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $bloodDonationRequest = BloodDonationRequest::factory()->create();
        $patient = Patient::factory()->create();
        $blood_type = $this->faker->randomElement(/** enum_attributes **/);
        $urgency = $this->faker->randomElement(/** enum_attributes **/);
        $approved = $this->faker->boolean;

        $response = $this->put(route('blood-donation-request.update', $bloodDonationRequest), [
            'patient_id' => $patient->id,
            'blood_type' => $blood_type,
            'urgency'    => $urgency,
            'approved'   => $approved,
        ]);

        $bloodDonationRequest->refresh();

        $response->assertRedirect(route('blood-donation-request.index'));

        $this->assertEquals($patient->id, $bloodDonationRequest->patient_id);
        $this->assertEquals($blood_type, $bloodDonationRequest->blood_type);
        $this->assertEquals($urgency, $bloodDonationRequest->urgency);
        $this->assertEquals($approved, $bloodDonationRequest->approved);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $bloodDonationRequest = BloodDonationRequest::factory()->create();

        $response = $this->delete(route('blood-donation-request.destroy', $bloodDonationRequest));

        $response->assertRedirect(route('blood-donation-request.index'));

        $this->assertDeleted($bloodDonationRequest);
    }
}
