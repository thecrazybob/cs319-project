<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Document;
use App\Models\File;
use App\Models\Patient;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DocumentController
 */
class DocumentControllerTest extends TestCase
{
    use AdditionalAssertions;
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $documents = Document::factory()->count(3)->create();

        $response = $this->get(route('document.index'));

        $response->assertOk();
        $response->assertViewIs('document.index');
        $response->assertViewHas('documents');
    }

    /**
     * @test
     */
    public function show_displays_view()
    {
        $document = Document::factory()->create();

        $response = $this->get(route('document.show', $document));

        $response->assertOk();
        $response->assertViewIs('document.show');
        $response->assertViewHas('document');
    }

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('document.create'));

        $response->assertOk();
        $response->assertViewIs('document.create');
    }

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentController::class,
            'store',
            \App\Http\Requests\DocumentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $patient = Patient::factory()->create();
        $file = File::factory()->create();
        $name = $this->faker->name;
        $type = $this->faker->word;
        $upload_date = $this->faker->date();

        $response = $this->post(route('document.store'), [
            'patient_id'  => $patient->id,
            'file_id'     => $file->id,
            'name'        => $name,
            'type'        => $type,
            'upload_date' => $upload_date,
        ]);

        $documents = Post::query()
            ->where('patient_id', $patient->id)
            ->where('file_id', $file->id)
            ->where('name', $name)
            ->where('type', $type)
            ->where('upload_date', $upload_date)
            ->get();
        $this->assertCount(1, $documents);
        $document = $documents->first();

        $response->assertRedirect(route('post.index'));
    }

    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DocumentController::class,
            'update',
            \App\Http\Requests\DocumentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $document = Document::factory()->create();
        $patient = Patient::factory()->create();
        $file = File::factory()->create();
        $name = $this->faker->name;
        $type = $this->faker->word;
        $upload_date = $this->faker->date();

        $response = $this->put(route('document.update', $document), [
            'patient_id'  => $patient->id,
            'file_id'     => $file->id,
            'name'        => $name,
            'type'        => $type,
            'upload_date' => $upload_date,
        ]);

        $document->refresh();

        $response->assertRedirect(route('post.index'));

        $this->assertEquals($patient->id, $document->patient_id);
        $this->assertEquals($file->id, $document->file_id);
        $this->assertEquals($name, $document->name);
        $this->assertEquals($type, $document->type);
        $this->assertEquals(Carbon::parse($upload_date), $document->upload_date);
    }

    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $document = Document::factory()->create();

        $response = $this->delete(route('document.destroy', $document));

        $response->assertRedirect(route('document.index'));

        $this->assertDeleted($document);
    }
}
