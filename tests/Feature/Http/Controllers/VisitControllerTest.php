<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Visit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VisitController
 */
class VisitControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $visits = Visit::factory()->count(3)->create();

        $response = $this->get(route('visit.index'));

        $response->assertOk();
        $response->assertViewIs('visit.index');
        $response->assertViewHas('visits');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $visit = Visit::factory()->create();

        $response = $this->get(route('visit.show', $visit));

        $response->assertOk();
        $response->assertViewIs('visit.show');
        $response->assertViewHas('visit');
    }
}
