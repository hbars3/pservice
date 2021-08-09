<?php

namespace Tests\Feature;

use App\Models\Profile;
use Database\Factories\ProfileFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowErrorProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        $profile = Profile::factory()->count(1)->create();
        $user = $profile->first()->user;
        $response = $this->actingAs($user)->get('/profile/create');
        $response->assertStatus(200);
    }
}
