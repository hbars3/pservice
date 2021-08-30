<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EliminarErrorUsuarioTest extends TestCase
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
        $response = $this->actingAs($user)->delete('/user/delete');

        // $this->assertCount(0, User::where('email', $user->email)->all());
        $user = User::where('email', $user->email)->first();
        $this->assertEquals(null, $user);
    }
}
