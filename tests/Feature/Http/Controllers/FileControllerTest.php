<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FileController
 */
class FileControllerTest extends TestCase
{
    /**
     * @test
     */
    public function show_displays_view()
    {
        $file = File::factory()->create();

        $response = $this->get(route('file.show', $file));

        $response->assertOk();
        $response->assertViewIs('file.show');
        $response->assertViewHas('file');
    }
}
