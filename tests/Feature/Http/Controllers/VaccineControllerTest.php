<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VaccineController
 */
class VaccineControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $vaccines = Vaccine::factory()->count(3)->create();

        $response = $this->get(route('vaccine.index'));

        $response->assertOk();
        $response->assertViewIs('vaccine.index');
        $response->assertViewHas('vaccines');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $vaccine = Vaccine::factory()->create();

        $response = $this->get(route('vaccine.show', $vaccine));

        $response->assertOk();
        $response->assertViewIs('vaccine.show');
        $response->assertViewHas('vaccine');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('vaccine.create'));

        $response->assertOk();
        $response->assertViewIs('vaccine.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VaccineController::class,
            'store',
            \App\Http\Requests\VaccineStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $vaccine_type = $this->faker->randomElement(/** enum_attributes **/);
        $dose_no = $this->faker->numberBetween(-10000, 10000);
        $vaccine_date = $this->faker->date();

        $response = $this->post(route('vaccine.store'), [
            'vaccine_type' => $vaccine_type,
            'dose_no'      => $dose_no,
            'vaccine_date' => $vaccine_date,
        ]);

        $vaccines = Vaccine::query()
            ->where('vaccine_type', $vaccine_type)
            ->where('dose_no', $dose_no)
            ->where('vaccine_date', $vaccine_date)
            ->get();
        $this->assertCount(1, $vaccines);
        $vaccine = $vaccines->first();

        $response->assertRedirect(route('vaccine.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VaccineController::class,
            'update',
            \App\Http\Requests\VaccineUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $vaccine = Vaccine::factory()->create();
        $patient = Patient::factory()->create();
        $vaccine_type = $this->faker->randomElement(/** enum_attributes **/);
        $vaccine_date = $this->faker->date();
        $dose_no = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('vaccine.update', $vaccine), [
            'patient_id'   => $patient->id,
            'vaccine_type' => $vaccine_type,
            'vaccine_date' => $vaccine_date,
            'dose_no'      => $dose_no,
        ]);

        $vaccine->refresh();

        $response->assertRedirect(route('vaccine.index'));

        $this->assertEquals($patient->id, $vaccine->patient_id);
        $this->assertEquals($vaccine_type, $vaccine->vaccine_type);
        $this->assertEquals(Carbon::parse($vaccine_date), $vaccine->vaccine_date);
        $this->assertEquals($dose_no, $vaccine->dose_no);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $vaccine = Vaccine::factory()->create();

        $response = $this->delete(route('vaccine.destroy', $vaccine));

        $response->assertRedirect(route('vaccine.index'));

        $this->assertDeleted($vaccine);
    }
}
