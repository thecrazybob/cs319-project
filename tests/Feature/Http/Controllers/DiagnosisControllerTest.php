<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DiagnosisController
 */
class DiagnosisControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $diagnosis = Diagnosis::factory()->count(3)->create();

        $response = $this->get(route('diagnosi.index'));

        $response->assertOk();
        $response->assertViewIs('diagnosis.index');
        $response->assertViewHas('diagnosis');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $diagnosis = Diagnosis::factory()->create();

        $response = $this->get(route('diagnosis.show', $diagnosis));

        $response->assertOk();
        $response->assertViewIs('diagnosis.show');
        $response->assertViewHas('diagnosis');
    }
}
