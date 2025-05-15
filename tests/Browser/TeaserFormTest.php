<?php


namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TeaserFormTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_submit_teaser_form()
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/overview')
                ->type('headline', 'Browser Teaser')
                ->type('body', 'This is a browser test teaser.')
                ->attach('image', __DIR__.'/files/example.jpg')
                ->press('Inhalte ausspielen')
                ->waitForText('Teaser created successfully!')
                ->assertSee('Teaser created successfully!');
        });
    }
}
