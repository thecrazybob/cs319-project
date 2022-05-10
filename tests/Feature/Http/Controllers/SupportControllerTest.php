<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Department;
use App\Models\Patient;
use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SupportController
 */
class SupportControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $supports = Support::factory()->count(3)->create();

        $response = $this->get(route('support.index'));

        $response->assertOk();
        $response->assertViewIs('patient.index');
        $response->assertViewHas('patients');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $support = Support::factory()->create();

        $response = $this->get(route('support.show', $support));

        $response->assertOk();
        $response->assertViewIs('support.show');
        $response->assertViewHas('support');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('support.create'));

        $response->assertOk();
        $response->assertViewIs('support.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SupportController::class,
            'store',
            \App\Http\Requests\SupportStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $subject = $this->faker->word;

        $response = $this->post(route('support.store'), [
            'subject' => $subject,
        ]);

        $supports = Support::query()
            ->where('subject', $subject)
            ->get();
        $this->assertCount(1, $supports);
        $support = $supports->first();

        $response->assertRedirect(route('support.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SupportController::class,
            'update',
            \App\Http\Requests\SupportUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $support = Support::factory()->create();
        $department = Department::factory()->create();
        $patient = Patient::factory()->create();
        $subject = $this->faker->word;
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $priority = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('support.update', $support), [
            'department_id' => $department->id,
            'patient_id'    => $patient->id,
            'subject'       => $subject,
            'status'        => $status,
            'priority'      => $priority,
        ]);

        $support->refresh();

        $response->assertRedirect(route('support.index'));

        $this->assertEquals($department->id, $support->department_id);
        $this->assertEquals($patient->id, $support->patient_id);
        $this->assertEquals($subject, $support->subject);
        $this->assertEquals($status, $support->status);
        $this->assertEquals($priority, $support->priority);
    }
}
