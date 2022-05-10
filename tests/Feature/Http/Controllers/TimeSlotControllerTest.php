<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TimeSlotController
 */
class TimeSlotControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $timeSlots = TimeSlot::factory()->count(3)->create();

        $response = $this->get(route('time-slot.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TimeSlotController::class,
            'update',
            \App\Http\Requests\TimeSlotUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $timeSlot = TimeSlot::factory()->create();
        $date = $this->faker->date();
        $duration = $this->faker->numberBetween(-10000, 10000);
        $capacity = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('time-slot.update', $timeSlot), [
            'date'     => $date,
            'duration' => $duration,
            'capacity' => $capacity,
        ]);

        $timeSlot->refresh();

        $response->assertRedirect(route('timeSlot.index'));

        $this->assertEquals(Carbon::parse($date), $timeSlot->date);
        $this->assertEquals($duration, $timeSlot->duration);
        $this->assertEquals($capacity, $timeSlot->capacity);
    }
}
