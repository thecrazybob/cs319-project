<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReportController
 */
class ReportControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $reports = Report::factory()->count(3)->create();

        $response = $this->get(route('report.index'));

        $response->assertOk();
        $response->assertViewIs('report.index');
        $response->assertViewHas('reports');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $report = Report::factory()->create();

        $response = $this->get(route('report.show', $report));

        $response->assertOk();
        $response->assertViewIs('report.show');
        $response->assertViewHas('report');
    }
}
