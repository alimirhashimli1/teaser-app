<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Teaser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeaserShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_own_teaser()
    {
        $user = User::factory()->create();
        $teaser = Teaser::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('teasers.show', $teaser));

        $response->assertOk();
        $response->assertSee($teaser->headline);
    }

    public function test_guest_is_redirected_to_login_when_viewing_teaser()
    {
        $teaser = Teaser::factory()->create();

        $response = $this->get(route('teasers.show', $teaser));

        $response->assertRedirect(route('login'));
    }
}
