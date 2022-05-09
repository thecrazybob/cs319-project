<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DoctorScheduleController
 */
class DoctorScheduleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $doctorSchedules = DoctorSchedule::factory()->count(3)->create();

        $response = $this->get(route('doctor-schedule.index'));

        $response->assertOk();
        $response->assertViewIs('doctor-schedule.index');
        $response->assertViewHas('schedule');
    }
}
