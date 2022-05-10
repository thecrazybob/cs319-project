<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TestController
 */
class TestControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tests = Test::factory()->count(3)->create();

        $response = $this->get(route('test.index'));

        $response->assertOk();
        $response->assertViewIs('test.index');
        $response->assertViewHas('tests');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $test = Test::factory()->create();

        $response = $this->get(route('test.show', $test));

        $response->assertOk();
        $response->assertViewIs('test.show');
        $response->assertViewHas('test');
    }
}
