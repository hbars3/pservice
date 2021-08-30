<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreErrorUserTest extends TestCase
{

    /** @test */
    public function a_user_can_be_created()
    {

        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'jhon',
            'email' => 'jhon@test.com',
            'password' => '54321678',
            'password_confirmation' => '54321678'
        ]);

        // $response->assertOk();

        $user = User::where('email', 'jhon@test.com')->first();

        $this->assertEquals($user->name, 'jhon');
        $this->assertEquals($user->email, 'jhon@test.com');
    }
}
