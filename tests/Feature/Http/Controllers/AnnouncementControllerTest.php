<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AnnouncementController
 */
class AnnouncementControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $announcements = Announcement::factory()->count(3)->create();

        $response = $this->get(route('announcement.index'));

        $response->assertOk();
        $response->assertViewIs('announcement.index');
        $response->assertViewHas('announcements');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $announcement = Announcement::factory()->create();

        $response = $this->get(route('announcement.show', $announcement));

        $response->assertOk();
        $response->assertViewIs('announcement.show');
        $response->assertViewHas('announcement');
    }
}
