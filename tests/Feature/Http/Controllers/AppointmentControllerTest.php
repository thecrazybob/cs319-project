<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AppointmentController
 */
class AppointmentControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $appointments = Appointment::factory()->count(3)->create();

        $response = $this->get(route('appointment.index'));

        $response->assertOk();
        $response->assertViewIs('appointment.index');
        $response->assertViewHas('appointments');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $appointment = Appointment::factory()->create();

        $response = $this->get(route('appointment.show', $appointment));

        $response->assertOk();
        $response->assertViewIs('appointment.show');
        $response->assertViewHas('appointment');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('appointment.create'));

        $response->assertOk();
        $response->assertViewIs('appointment.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AppointmentController::class,
            'store',
            \App\Http\Requests\AppointmentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $appointment_date = $this->faker->date();
        $description = $this->faker->text;

        $response = $this->post(route('appointment.store'), [
            'appointment_date' => $appointment_date,
            'description'      => $description,
        ]);

        $appointments = Appointment::query()
            ->where('appointment_date', $appointment_date)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $appointments);
        $appointment = $appointments->first();

        $response->assertRedirect(route('appointment.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AppointmentController::class,
            'update',
            \App\Http\Requests\AppointmentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $appointment = Appointment::factory()->create();
        $patient = Patient::factory()->create();
        $department = Department::factory()->create();
        $appointment_date = $this->faker->date();
        $description = $this->faker->text;
        $confirmed = $this->faker->boolean;

        $response = $this->put(route('appointment.update', $appointment), [
            'patient_id'       => $patient->id,
            'department_id'    => $department->id,
            'appointment_date' => $appointment_date,
            'description'      => $description,
            'confirmed'        => $confirmed,
        ]);

        $appointment->refresh();

        $response->assertRedirect(route('appointment.index'));

        $this->assertEquals($patient->id, $appointment->patient_id);
        $this->assertEquals($department->id, $appointment->department_id);
        $this->assertEquals(Carbon::parse($appointment_date), $appointment->appointment_date);
        $this->assertEquals($description, $appointment->description);
        $this->assertEquals($confirmed, $appointment->confirmed);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $appointment = Appointment::factory()->create();

        $response = $this->delete(route('appointment.destroy', $appointment));

        $response->assertRedirect(route('appointment.index'));

        $this->assertDeleted($appointment);
    }
}
