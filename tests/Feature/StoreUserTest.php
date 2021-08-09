<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserTest extends TestCase
{

    /** @test */
    public function a_user_can_be_created()
    {

        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'pablo5',
            'email' => 'pablo5@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        // $response->assertOk();

        $user = User::where('email', 'pablo5@test.com')->first();

        $this->assertEquals($user->name, 'pablo5');
        $this->assertEquals($user->email, 'pablo5@test.com');
    }
}
