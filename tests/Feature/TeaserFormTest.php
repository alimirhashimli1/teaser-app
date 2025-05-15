<?php

namespace Tests\Feature;
use Livewire\Livewire;


use App\Models\User;
use App\Models\Teaser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TeaserFormTest extends TestCase
{
    use RefreshDatabase;

    public function authenticated_user_can_create_teaser()
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $this->actingAs($user);

        $file = UploadedFile::fake()->image('example.jpg');

        Livewire::test(\App\Livewire\TeaserForm::class)
            ->set('headline', 'Test Teaser')
            ->set('body', 'Test body content here')
            ->set('image', $file)
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('teasers', [
            'headline' => 'Test Teaser',
            'body' => 'Test body content here',
            'user_id' => $user->id,
        ]);

        Storage::disk('public')->assertExists('teasers/' . $file->hashName());
    }

    public function guest_cannot_create_teaser()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('example.jpg');

        Livewire::test(\App\Livewire\TeaserForm::class)
            ->set('headline', 'Unauthorized Teaser')
            ->set('body', 'Should fail')
            ->set('image', $file)
            ->call('submit')
            ->assertForbidden();
    }


    public function test_image_upload_is_required()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    Livewire::test(\App\Livewire\TeaserForm::class)
        ->set('headline', 'No Image Test')
        ->set('body', 'Some text here')
        ->call('submit')
        ->assertHasErrors(['image' => 'required']);
}


public function test_non_image_file_is_rejected()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $file = UploadedFile::fake()->create('not-an-image.pdf', 100, 'application/pdf');

    Livewire::test(\App\Livewire\TeaserForm::class)
        ->set('headline', 'Wrong File')
        ->set('body', 'Should fail')
        ->set('image', $file)
        ->call('submit')
        ->assertHasErrors(['image' ]);
}

}
