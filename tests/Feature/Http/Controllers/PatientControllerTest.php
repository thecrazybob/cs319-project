<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PatientController
 */
class PatientControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $patients = Patient::factory()->count(3)->create();

        $response = $this->get(route('patient.index'));

        $response->assertOk();
        $response->assertViewIs('patient.index');
        $response->assertViewHas('patients');
    }
}
