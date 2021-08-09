<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_created()
    {

        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'juanito',
            'email' => 'juanito@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);

        // $response->assertOk();

        $user = User::where('email', 'juanito@test.com')->first();

        $this->assertEquals($user->name, 'juanito');
        $this->assertEquals($user->email, 'juanito@test.com');
    }
}
